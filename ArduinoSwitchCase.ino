// Arduino Switch Case Example
// Two buttons connected to pins 9 and 10
// Counter variable c starts at 0
// Switch case checks value of c and prints different messages

// Define button pins
const int buttonPin1 = 9;  // First button connected to pin 9
const int buttonPin2 = 10; // Second button connected to pin 10

// Counter variable
int c = 0;

void setup() {
  // Initialize serial communication at 9600 baud
  Serial.begin(9600);
  
  // Set button pins as inputs with pull-up resistors
  pinMode(buttonPin1, INPUT_PULLUP);
  pinMode(buttonPin2, INPUT_PULLUP);
  
  // Print initial message
  Serial.println("System initialized. Counter = 0");
}

void loop() {
  // Check if button 1 is pressed (increment counter)
  if (digitalRead(buttonPin1) == LOW) {
    c++; // Increment counter
    delay(300); // Debounce delay
    Serial.print("Button 1 pressed. Counter = ");
    Serial.println(c);
  }
  
  // Check if button 2 is pressed (decrement counter)
  if (digitalRead(buttonPin2) == LOW) {
    c--; // Decrement counter
    delay(300); // Debounce delay
    Serial.print("Button 2 pressed. Counter = ");
    Serial.println(c);
  }
  
  // Use switch case to check counter value and print appropriate message
  switch (c) {
    case 10:
      Serial.println("ting ting");
      break;
    case -10:
      Serial.println("ding ding");
      break;
    default:
      Serial.println("tik tak");
      break;
  }
  
  // Delay for 10 seconds as required
  delay(10000);
} 