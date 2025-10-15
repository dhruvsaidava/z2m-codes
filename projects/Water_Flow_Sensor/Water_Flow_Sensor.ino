/*
  Project: Water Flow Sensor
  Description:
    - Measures water flow rate using a Hall effect flow sensor.
    - Uses interrupts to count pulses from the sensor and calculates flow in liters per minute.
*/

int flowPin = 3;        // Sensor connected to digital pin 3
double flowRate;        // Calculated flow rate
volatile int count;     // Pulse count, must be volatile for interrupt accuracy

void setup() {
  pinMode(flowPin, INPUT);                     // Set pin as input
  attachInterrupt(digitalPinToInterrupt(3), Flow, RISING); // Attach interrupt on rising signal
  Serial.begin(9600);                          // Initialize Serial Monitor
  Serial.println("Water Flow Sensor Initialized...");
}

void loop() {
  count = 0;              // Reset counter
  interrupts();           // Enable interrupts
  delay(1000);            // Count pulses for 1 second
  noInterrupts();         // Disable interrupts while calculating

  // Calculate flow rate
  flowRate = (count * 2.25);     // Each pulse = 2.25 mL/sec
  flowRate = flowRate * 60;      // Convert to mL/min
  flowRate = flowRate / 1000.0;  // Convert to L/min

  // Print flow rate
  Serial.print("Flow Rate: ");
  Serial.print(flowRate);
  Serial.println(" L/min");

  delay(500); // Wait half a second before next measurement
}

// Interrupt Service Routine (ISR) - increments count when pulse detected
void Flow() {
  count++;
}
