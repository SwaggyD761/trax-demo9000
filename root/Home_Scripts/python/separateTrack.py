import separateTracks
import turnIntoMidi
import os
from flask import Flask, request, send_from_directory

app = Flask(__name__)

Track_separates = []
Track_MiDi = []

@app.route('/', methods=['GET', 'POST'])
def upload_song():
    if request.method == 'POST':
        file = request.files['audio-file']
        if file:
            global Track_separates
            global Track_MiDi

            # Separate audio file into MP3 instrument tracks
            Track_separates = separateTracks(file)

            # Convert each MP3 track to a MIDI file
            for track in Track_separates:
                Track_MiDi.append(turnIntoMidi(track))

            # Save MP3 and MIDI files to their respective directories
            for i, track in enumerate(Track_separates):
                track_filename = f"track_{i}.mp3"
                track_path = os.path.join(app.config['TRACK_SEPARATE_DIR'], track_filename)
                track.save(track_path)

            for i, midi in enumerate(Track_MiDi):
                midi_filename = f"track_{i}.midi"
                midi_path = os.path.join(app.config['TRACK_MIDI_DIR'], midi_filename)
                midi.save(midi_path)

            # Download MP3 and MIDI files to user
            return '''
                <html>
                    <head>
                        <title>Download Files</title>
                    </head>
                    <body>
                        <h1>Download Files</h1>
                        <ul>
                            <li><a href="/download/mp3">Download MP3 Tracks</a></li>
                            <li><a href="/download/midi">Download MIDI Tracks</a></li>
                        </ul>
                    </body>
                </html>
            '''
    return '''
        <html>
            <head>
                <title>Upload a Song</title>
            </head>
            <body>
                <h1>Upload a Song</h1>
                <form class="upload-song" action="/" method="post" enctype="multipart/form-data">
                    <input type="file" name="audio-file">
                    <input type="submit" value="Upload">
                </form>
            </body>
        </html>
    '''

@app.route('/download/mp3')
def download_mp3():
    return send_from_directory(app.config['TRACK_SEPARATE_DIR'], filename="*.mp3", as_attachment=True)

@app.route('/download/midi')
def download_midi():
    return send_from_directory(app.config['TRACK_MIDI_DIR'], filename="*.midi", as_attachment=True)

if __name__ == '__main__':
    app.config['TRACK_SEPARATE_DIR'] = os.path.join(app.root_path, 'Track_separate_Files')
    app.config['TRACK_MIDI_DIR'] = os.path.join(app.root_path, 'Track_Midi_Files')
    os.makedirs(app.config['TRACK_SEPARATE_DIR'], exist_ok=True)
    os.makedirs(app.config['TRACK_MIDI_DIR'], exist_ok=True)
    app.run(debug=True)
