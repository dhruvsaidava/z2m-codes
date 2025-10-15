/*
  Project: RF Transmitter
  Description:
    - Uses 433 MHz RF Transmitter module
    - Sends a simple "Hello World!" message every second
*/

#include <RH_ASK.h>
#include <SPI.h> // Required for compilation

// Create RF driver object
RH_ASK driver;

void setup() {
  Serial.begin(9600);
  if (!driver.init())
    Serial.println("RF Transmitter init failed");
  else
    Serial.println("RF Transmitter ready");
}

void loop() {
  const char *msg = "Hello World!";
  driver.send((uint8_t *)msg, strlen(msg));
  driver.waitPacketSent();
  Serial.println("Message sent: Hello World!");
  delay(1000);
}
