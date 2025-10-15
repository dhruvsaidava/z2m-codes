/*
  Project: Digital Temperature Sensor (DS18B20)
  Description:
    - Reads temperature data from DS18B20 sensor using OneWire and DallasTemperature libraries.
    - Displays temperature in Celsius on the Serial Monitor.
*/

#include <OneWire.h>
#include <DallasTemperature.h>

// Data wire connected to pin A0 on the Arduino
#define ONE_WIRE_BUS A0

// Setup a OneWire instance to communicate with any OneWire devices
OneWire oneWire(ONE_WIRE_BUS);

// Pass the OneWire reference to Dallas Temperature sensor library
DallasTemperature sensors(&oneWire);

void setup() {
  Serial.begin(9600);   // Initialize Serial Monitor
  sensors.begin();      // Start the DS18B20 sensor
}

void loop() {
  sensors.requestTemperatures(); // Request temperature data from the sensor

  // Print temperature in Celsius
  Serial.print("Temperature is: ");
  Serial.print(sensors.getTempCByIndex(0));
  Serial.println(" °C");

  delay(200); // Short delay between readings
}
