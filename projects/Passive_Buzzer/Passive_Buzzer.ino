/*
  Project: Passive Buzzer Police Siren
  Description:
    - Generates a two-tone alternating siren effect using a passive buzzer.
*/

int buzzer = 11;  // Buzzer connected to pin 11

void setup() {
  // No pinMode needed, tone() handles it automatically
}

void loop() {
  // Tone(pin, frequency in Hz, duration in ms)
  tone(buzzer, 440, 500);  // Play note A4 (440 Hz) for 500 ms
  delay(700);              // Wait 700 ms before next tone
  tone(buzzer, 880, 500);  // Play note A5 (880 Hz) for 500 ms
  delay(700);              // Wait 700 ms before repeating
}
