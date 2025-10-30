/*
  Project: IR Remote Receiver
  Description:
    - Reads infrared signals from an IR remote using an IR receiver module.
    - Displays the hexadecimal code for each button pressed on the Serial Monitor.
*/

#include <IRremote.h>

const int RECV_PIN = 7;   // IR Receiver connected to digital pin 7
IRrecv irrecv(RECV_PIN);  // Create IR receiver object
decode_results results;   // Variable to store decoded results

void setup() {
  Serial.begin(9600);     // Initialize Serial Monitor
  irrecv.enableIRIn();    // Start IR receiver
  irrecv.blink13(true);   // Blink onboard LED when signal is received
}

void loop() {
  // Check if IR signal is received
  if (irrecv.decode(&results)) {
    // Print the received IR code in HEX format
    Serial.println(results.value, HEX);
    irrecv.resume();  // Prepare to receive the next signal
  }
}
