/*
  Project: RF Receiver
  Description:
    - Uses 433 MHz RF Receiver module
    - Listens for messages and prints them to Serial Monitor
*/

#include <RH_ASK.h>
#include <SPI.h> // Required for compilation

// Create RF driver object
RH_ASK driver;

void setup() {
  Serial.begin(9600);
  if (!driver.init())
    Serial.println("RF Receiver init failed");
  else
    Serial.println("RF Receiver ready");
}

void loop() {
  uint8_t buf[32];      // Buffer for received data
  uint8_t buflen = sizeof(buf);

  if (driver.recv(buf, &buflen)) {  // Non-blocking receive
    Serial.print("Message received: ");
    Serial.println((char*)buf);
  }
}
