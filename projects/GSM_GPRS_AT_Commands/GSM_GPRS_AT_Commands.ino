#include <SoftwareSerial.h>

/*
  Project: GPRS GSM Module Basic AT Command Test
  Description:
    - Communicates with GSM module via SoftwareSerial
    - Sends basic AT commands for connection testing
*/

SoftwareSerial mySerial(3, 2); // Tx -> Arduino #3, Rx -> #2

void setup() {
  Serial.begin(9600);
  mySerial.begin(9600);

  mySerial.println("AT");           // Handshake test (Expect "OK")
  updateSerial();

  mySerial.println("AT+CSQ");       // Signal quality test (0–31)
  updateSerial();

  mySerial.println("AT+CCID");      // Check SIM presence
  updateSerial();

  mySerial.println("AT+CREG?");     // Check network registration
  updateSerial();
}

void loop() {
  updateSerial();
}

void updateSerial() {
  while (Serial.available()) {
    mySerial.write(Serial.read());   // Forward Serial data to GSM module
  }
  while (mySerial.available()) {
    Serial.write(mySerial.read());   // Forward GSM data to Serial Monitor
  }
}
