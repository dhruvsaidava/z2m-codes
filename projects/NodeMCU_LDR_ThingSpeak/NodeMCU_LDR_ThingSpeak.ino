/*
  Project: NodeMCU LDR Data Logging to ThingSpeak
  Description:
    - Reads light intensity using LDR sensor connected to A0.
    - Sends data to ThingSpeak channel via WiFi.
*/

#include <ESP8266WiFi.h>
#include <WiFiClient.h>
#include <ThingSpeak.h>

// Replace with your WiFi credentials
const char* ssid = "Your_SSID_Here";       // WiFi Name
const char* password = "Your_Password_Here"; // WiFi Password

// ThingSpeak credentials
unsigned long myChannelNumber = YYYYYY;     // Replace with your ThingSpeak Channel Number
const char* myWriteAPIKey = "XXXXXXXXXXXXXXX"; // Replace with your Write API Key

// Sensor configuration
int LDRpin = A0;   // LDR sensor connected to A0 pin
int value = 0;     // Variable to store LDR reading

WiFiClient client;

void setup() {
  Serial.begin(9600);
  delay(10);

  Serial.println("Connecting to WiFi...");
  WiFi.begin(ssid, password);

  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");
  Serial.print("IP address: ");
  Serial.println(WiFi.localIP());

  ThingSpeak.begin(client);
}

void loop() {
  value = analogRead(LDRpin);  // Read LDR sensor value
  Serial.print("LDR Value: ");
  Serial.println(value);

  // Send data to ThingSpeak
  int response = ThingSpeak.writeField(myChannelNumber, 1, value, myWriteAPIKey);

  if (response == 200) {
    Serial.println("Data sent to ThingSpeak successfully.");
  } else {
    Serial.print("Error sending data. HTTP error code: ");
    Serial.println(response);
  }

  delay(15000); // ThingSpeak allows updates every 15 seconds
}
