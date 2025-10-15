/*
  Project: NeoPixel LED Strip (Adafruit NeoPixel Library)
  Description:
    - Controls an 8-LED NeoPixel strip.
    - Lights LEDs one by one in green color with a short delay.
*/

#include <Adafruit_NeoPixel.h>
#ifdef __AVR__
  #include <avr/power.h>
#endif

// Define pin connected to NeoPixel data line
#define PIN 6

// Define number of NeoPixels
#define NUMPIXELS 8

// Create NeoPixel object
Adafruit_NeoPixel pixels = Adafruit_NeoPixel(NUMPIXELS, PIN, NEO_GRB + NEO_KHZ800);

// Delay between lighting each pixel (in milliseconds)
int delayval = 500;

void setup() {
  // Initialize NeoPixel library
  pixels.begin();
}

void loop() {
  // Loop through each pixel in the strip
  for (int i = 0; i < NUMPIXELS; i++) {
    // Set pixel color (RGB: 0,150,0 -> moderate green)
    pixels.setPixelColor(i, pixels.Color(0, 150, 0));

    // Send updated color data to strip
    pixels.show();

    // Wait before lighting next pixel
    delay(delayval);
  }
}
