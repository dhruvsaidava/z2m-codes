/*
  Project: Liquid Crystal Display (LCD) with I2C Interface
  Description:
    - Displays messages on a 16x2 I2C LCD module.
    - Uses LiquidCrystal_I2C library for easy communication.
*/

#include <Wire.h>
#include <LiquidCrystal_I2C.h>

// Set the LCD address to 0x27 for a 16x2 display
LiquidCrystal_I2C lcd(0x27, 16, 2);

void setup() {
  lcd.begin();      // Initialize the LCD
  lcd.backlight();  // Turn on the backlight
}

void loop() {
  // Set cursor to column 3, row 1 (second line)
  lcd.setCursor(3, 1);
  lcd.print("Zero2Maker!");

  // Set cursor to column 4, row 0 (first line)
  lcd.setCursor(4, 0);
  lcd.print("I feel happy!");

  delay(1000);  // Display for 1 second

  // Clear the LCD display
  lcd.clear();
  delay(500);
}
