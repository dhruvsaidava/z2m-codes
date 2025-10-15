/*
  Project: LED Matrix Display (MAX7219)
  Description:
    - Displays characters "Z", "II", and "M" sequentially on an 8x8 LED matrix.
    - Uses the LedControl library.
*/

#include <LedControl.h>

int DIN = 12;  // Data In pin
int CS = 11;   // Chip Select pin
int CLK = 10;  // Clock pin

// Binary pattern for "Z"
byte z[8] = {
  B11111111,
  B11111111,
  B00001110,
  B00011100,
  B00111000,
  B01110000,
  B11111111,
  B11111111
};

// Hex values for "II" and "M"
byte II[8] = {0x7C, 0x7C, 0x0C, 0x7C, 0x7C, 0x60, 0x7C, 0x7C};
byte m[8] = {0x81, 0xC3, 0xA5, 0x99, 0x81, 0x81, 0x81, 0x81};

// Initialize LED control object: LedControl(dataPin, clockPin, csPin, numDevices)
LedControl lc = LedControl(DIN, CLK, CS, 1);

void setup() {
  // Wake up MAX72XX from power-saving mode
  lc.shutdown(0, false);

  // Set brightness level (0–15)
  lc.setIntensity(0, 8);

  // Clear display at startup
  lc.clearDisplay(0);
}

void loop() {
  printByte(z);
  delay(1000);
  printByte(II);
  delay(1000);
  printByte(m);
  delay(1000);
}

// Function to display an 8x8 pattern
void printByte(byte character[8]) {
  for (int i = 0; i < 8; i++) {
    lc.setRow(0, i, character[i]);
  }
}
