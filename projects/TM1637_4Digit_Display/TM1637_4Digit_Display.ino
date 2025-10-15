/*
  Project: 7-Segment 4-Digit Display Example
  Module: TM1637 4-Digit Display
  Library: TM1637Display
  Description:
    - Counts from 0 to 100
    - Displays temperature (e.g., 24°C)
*/

#include <TM1637Display.h>

/* Define the connection pins */
#define CLK 2
#define DIO 3

/* Create display object */
TM1637Display display = TM1637Display(CLK, DIO);

/* Create degree Celsius symbol */
const uint8_t celsius[] = {
  SEG_A | SEG_B | SEG_F | SEG_G,  // Circle for degree symbol
  SEG_A | SEG_D | SEG_E | SEG_F   // C
};

void setup() {
  /* Clear the display */
  display.clear();
  delay(1000);
}

void loop() {
  /* Set brightness (0–7) */
  display.setBrightness(4);

  /* Show counter from 0 to 100 */
  for (int i = 0; i <= 100; i++) {
    display.showNumberDec(i);
    delay(50);
  }

  delay(1000);
  display.clear();

  /* Display temperature as example */
  int temperature = 24;

  /*
    display.showNumberDec(arg_1, arg_2, arg_3, arg_4)
      arg_1 -> Number of type integer (up to 9999)
      arg_2 -> True/false: Display leading zeroes
      arg_3 -> Number of digits to display
      arg_4 -> Position of the least significant digit (0 = leftmost)
  */
  display.showNumberDec(temperature, false, 2, 0);

  /*
    display.setSegments(arg_1, arg_2, arg_3)
      arg_1 -> Segment information
      arg_2 -> Number of digits to modify (0–4)
      arg_3 -> Position from which to print (0 = leftmost)
  */
  display.setSegments(celsius, 2, 2);

  delay(1000);

  /* Stop program */
  while (1);
}
