/*
  Project: RFID Reader (MFRC522)
  Description:
    - Reads RFID cards using MFRC522 (RC522) module.
    - Prints UID and checks for authorized UID.
    - Requires MFRC522 library (install via Library Manager or add zip).
*/

#include <SPI.h>
#include <MFRC522.h>

// Set pin numbers for SDA (SS) and RST of RFID module
#define SDA_PIN 10
#define RST_PIN 9

MFRC522 mfrc522(SDA_PIN, RST_PIN); // Create MFRC522 instance

void setup() {
  // Initialize serial communication, SPI bus, and MFRC522 module
  Serial.begin(9600);
  while (!Serial); // Wait for Serial (for boards that need it)
  SPI.begin();
  mfrc522.PCD_Init();
  Serial.println("Scan a card near the reader...");
  Serial.println();
}

void loop() {
  // Look for new cards
  if (!mfrc522.PICC_IsNewCardPresent()) {
    return;
  }

  // Select one of the cards
  if (!mfrc522.PICC_ReadCardSerial()) {
    return;
  }

  // Show UID on Serial Monitor
  Serial.print("UID tag :");
  String content = "";
  for (byte i = 0; i < mfrc522.uid.size; i++) {
    Serial.print(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " ");
    Serial.print(mfrc522.uid.uidByte[i], HEX);
    content.concat(String(mfrc522.uid.uidByte[i] < 0x10 ? " 0" : " "));
    content.concat(String(mfrc522.uid.uidByte[i], HEX));
  }
  Serial.println();
  Serial.print("Message : ");
  content.toUpperCase();
  Serial.println(content);

  // Check authorized UID(s) - change the string below to match your card's UID
  if (content.substring(1) == "8D 97 E7 2B") {
    Serial.println("Authorized access");
    Serial.println();
    delay(3000);
  } else {
    Serial.println("Access denied");
    delay(3000);
  }

  // Halt PICC (optional) and stop encryption on PCD
  mfrc522.PICC_HaltA();
  mfrc522.PCD_StopCrypto1();
}
