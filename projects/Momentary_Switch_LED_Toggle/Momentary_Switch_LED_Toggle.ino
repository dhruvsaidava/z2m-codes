/*
  Project: Momentary Switch LED Toggle
  Description:
    - Toggles an LED on/off each time the push button is pressed.
    - Uses internal pull-up resistor for stable input.
*/

int led = 13;
int button = 4;

/* Initialize LED and button states */
int ledState = LOW;
int buttonCurrent;
int buttonPrevious = HIGH;

void setup() {
  pinMode(button, INPUT_PULLUP); // Use internal pull-up resistor
  pinMode(led, OUTPUT);          // LED as output
  Serial.begin(9600);            // Start serial monitor for debugging
}

void loop() {
  // Read current button state
  buttonCurrent = digitalRead(button);

  // Detect button press (transition from LOW to HIGH)
  if (buttonCurrent == HIGH && buttonPrevious == LOW) {
    ledState = !ledState; // Toggle LED state
  }

  // Print button state to serial monitor
  Serial.println(buttonCurrent);

  // Update previous button state
  buttonPrevious = buttonCurrent;

  // Apply LED state
  digitalWrite(led, ledState);

  delay(200); // Simple debounce delay
}
