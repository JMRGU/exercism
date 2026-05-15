// @ts-check
//
// The line above enables type checking for this file. Various IDEs interpret
// the @ts-check directive. It will give you helpful autocompletion when
// implementing this exercise.

/**
 * Calculates the total bird count.
 *
 * @param {number[]} birdsPerDay
 * @returns {number} total bird count
 */
export function totalBirdCount(birdsPerDay) {
  return Object.values(birdsPerDay).slice(0, -1).reduce((acc, x) => acc + +x, 0);
}

/**
 * Calculates the total number of birds seen in a specific week.
 *
 * @param {number[]} birdsPerDay
 * @param {number} week
 * @returns {number} birds counted in the given week
 */
export function birdsInWeek(birdsPerDay, week) {
  // Doing it how they want (I wouldn't form my data like this)
  origin = (week - 1) * 7
  let totalBirds = 0;
  for (let i = origin; i < origin + 7; i++){
      console.log(`i: ${i}, totalBirds: ${totalBirds}`)
      totalBirds += birdsPerDay[i];
  }
  return totalBirds;
}

/**
 * Fixes the counting mistake by increasing the bird count
 * by one for every second day.
 *
 * @param {number[]} birdsPerDay
 * @returns {void} should not return anything
 */
export function fixBirdCountLog(birdsPerDay) {
  for (let i = 0; i < birdsPerDay['length']; i += 2){
    birdsPerDay[i] += 1;
  }
  return birdsPerDay;
}
