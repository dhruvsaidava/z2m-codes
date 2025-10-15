/*
  Project: Humidity and Temperature Sensor (DHT11)
  Description:
    - Reads temperature (°C) and humidity (%RH) from DHT11 sensor.
    - Displays values on Serial Monitor.
*/

#include <SimpleDHT.h>

// Define DHT11 pin and object
int pinDHT11 = 7;
SimpleDHT11 dht11(pinDHT11);

void setup() {
  Serial.begin(9600);  // Initialize Serial Monitor
}

void loop() {
  Serial.println("=================================");
  Serial.println("Reading from DHT11 Sensor...");

  // Variables to store readings
  byte temperature = 0;
  byte humidity = 0;
  int err = SimpleDHTErrSuccess;

  // Read data from sensor and handle errors
  if ((err = dht11.read(&temperature, &humidity, NULL)) != SimpleDHTErrSuccess) {
    Serial.print("Read DHT11 failed, err=");
    Serial.println(err);
    delay(1000);
    return;
  }

  // If successful, print values
  Serial.print("Sample OK: ");
  Serial.print((int)temperature);
  Serial.print(" °C, ");
  Serial.print((int)humidity);
  Serial.println(" RH");

  // Wait before next reading
  delay(1500);
}
