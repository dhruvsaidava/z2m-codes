/*
  Project: GPS Module Serial Interface
  Description:
    - Reads data from GPS module (e.g., NEO-6M)
    - Forwards GPS serial data to Arduino Serial Monitor
*/

#include <SoftwareSerial.h>

int RXPin = 4;  // Receiver pin (connected to TX of GPS module)
int TXPin = 3;  // Transmitter pin (connected to RX of GPS module)
int GPSBaud = 9600;  // GPS communication baud rate

// Create a software serial port named 'gpsSerial'
SoftwareSerial gpsSerial(RXPin, TXPin);

void setup() {
  Serial.begin(9600);       // Start Serial Monitor
  gpsSerial.begin(GPSBaud); // Start communication with GPS module
}

void loop() {
  // Continuously read and forward GPS data to Serial Monitor
  while (gpsSerial.available() > 0) {
    Serial.write(gpsSerial.read());
  }
}
