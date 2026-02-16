/*
  Project: Accelerometer Readings (Analog)
  Description:
    - Reads X, Y, Z analog values from an accelerometer.
    - Scales and prints the readings as both raw values and approximate G-force.
*/

const int xInput = A0;
const int yInput = A1;
const int zInput = A2;

int RawMin = 0;
int RawMax = 1023;
const int sampleSize = 10;

void setup() {
  analogReference(EXTERNAL);  // Use external reference (if connected)
  Serial.begin(9600);
}

void loop() {
  // Read inputs for X, Y, and Z axes
  int xRaw = ReadAxis(xInput);
  int yRaw = ReadAxis(yInput);
  int zRaw = ReadAxis(zInput);

  // Scale raw values to ±3g range
  long xScaled = map(xRaw, RawMin, RawMax, -3000, 3000);
  long yScaled = map(yRaw, RawMin, RawMax, -3000, 3000);
  long zScaled = map(zRaw, RawMin, RawMax, -3000, 3000);

  // Convert to G-force (approximate)
  float xAccel = xScaled / 1000.0;
  float yAccel = yScaled / 1000.0;
  float zAccel = zScaled / 1000.0;

  // Display values on Serial Monitor
  Serial.print("X, Y, Z :: ");
  Serial.print(xRaw);
  Serial.print(", ");
  Serial.print(yRaw);
  Serial.print(", ");
  Serial.print(zRaw);
  Serial.print(" :: ");
  Serial.print(xAccel, 1);
  Serial.print("G, ");
  Serial.print(yAccel, 1);
  Serial.print("G, ");
  Serial.print(zAccel, 1);
  Serial.println("G");

  delay(200);
}

// Function to read and average multiple samples for stable output
int ReadAxis(int axisPin) {
  long total = 0;
  for (int i = 0; i < sampleSize; i++) {
    total += analogRead(axisPin);
  }
  return total / sampleSize;
}
