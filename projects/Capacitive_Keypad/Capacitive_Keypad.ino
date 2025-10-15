/*
  Project: Capacitive Touch Keypad
  Description:
    - Reads key presses from a 16-key capacitive keypad.
    - Outputs the pressed key number to the Serial Monitor.
*/

#define SCL_PIN 8  // Clock pin
#define SDO_PIN 9  // Data pin

byte Key; // Variable to store detected key state

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  pinMode(SCL_PIN, OUTPUT); // Set clock pin as output
  pinMode(SDO_PIN, INPUT);  // Set data pin as input
}

void loop() {
  // Read keypad state
  Key = Read_Keypad();

  // If a key is pressed, print its number
  if (Key) {
    Serial.print("Key Pressed: ");
    Serial.println(Key);
  }

  // Small delay to avoid flooding Serial Monitor
  delay(100);
}

// Function to read keypad state
byte Read_Keypad(void) {
  byte Count;
  byte Key_State = 0;

  // Pulse the clock pin 16 times (for 16 keys)
  for (Count = 1; Count <= 16; Count++) {
    digitalWrite(SCL_PIN, LOW);

    // If the data pin is LOW, store current key number (active low mode)
    if (!digitalRead(SDO_PIN)) {
      Key_State = Count;
    }

    digitalWrite(SCL_PIN, HIGH);
  }

  return Key_State; // Return detected key number
}
