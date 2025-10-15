/*
  Project: Sound Recorder Module Control
  Description:
    - Controls a sound recording and playback module (e.g., ISD1820).
    - Records for 5 seconds on startup, then repeatedly plays back the recording.
*/

int rec = 2;   // Record control pin
int play = 3;  // Playback control pin

void setup() {
  // Set Record and Playback pins as output
  pinMode(rec, OUTPUT);
  pinMode(play, OUTPUT);

  // Ensure both Record and Playback are OFF initially
  digitalWrite(rec, LOW);
  digitalWrite(play, LOW);

  // Record for 5 seconds (Red LED ON while recording)
  digitalWrite(rec, HIGH);
  delay(5000);         // Recording duration
  digitalWrite(rec, LOW);
  delay(1000);         // Wait before playback
}

void loop() {
  // Play back the recording repeatedly (Red LED blinks during playback)
  digitalWrite(play, HIGH);
  delay(100);          // Short pulse to trigger playback
  digitalWrite(play, LOW);
  delay(5000);         // Wait 5 seconds between playbacks
}
