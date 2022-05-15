/**
 * Running \`node Question_6.js\` will output the results.
 * Make an array of 200 numbers with duplicates.
 * Remove the duplicates.
 * ??? Return the number of duplicates in order.
 * 
 * The wording is ambiguous by asking to return the number of duplicates and the duplicates in order.
 * I would have better understanding if these instructions were attached to a project, and then
 * ask somebody if it were still too ambiguous to accurately solve.
 * 
 * I considered returning both in a JSON like object but thought this to be inefficient
 * because the client or other consumer of this class can use the length of the
 * to get the number of duplicates.
 */

class Question_6 {
  solve() {
    const numbers = this.getNumbers();
    const duplicateNumbers = this.getDuplicates(numbers);

    // Sort the duplicates in ascending order.
    duplicateNumbers.sort((a, b) => a - b);

    return duplicateNumbers;
  }

  getNumbers() {
    // Make the array of 200 numbers with duplicates.

    let count = 0;
    let number = Math.floor(Math.random() * 999999);
    const numbers = [];

    do {
      numbers.push(number);

      // Get a number 0 or 1. If 1 then reuse the number, else make new number.
      const isDuplicate = Math.floor(Math.random() * 2) > 0;
      if (!isDuplicate) {
        number = Math.floor(Math.random() * 999999);
      }

      // Increment count for array length.
      count++;
    } while (count < 200);

    return numbers;
  }

  getDuplicates(numbers = []) {
    const duplicateNumbers = [];

    for (let i = 0; i < numbers.length; i++) {
      const firstNumber = numbers[i];

      // Skip this number if its duplicates have already been added.
      if (duplicateNumbers.includes(firstNumber)) continue;

      for (let j = 0; j < numbers.length; j++) {
        const secondNumber = numbers[j];

        // Add to the duplicate if it's different indices and the same number.
        const isDifferentIndex = i !== j;
        const isSameNumber = firstNumber === secondNumber;

        if (isDifferentIndex && isSameNumber) {
          duplicateNumbers.push(firstNumber);
        }
      }

    }

    return duplicateNumbers;
  }
}

// Output the results.
const question6 = new Question_6();
const duplicates = question6.solve();

console.log('Duplicates in order: ', JSON.stringify(duplicates, null, 2));
console.log('Number of duplicates: ', duplicates.length);