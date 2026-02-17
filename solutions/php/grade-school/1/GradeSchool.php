<?php

/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */

declare(strict_types=1);

/*
    Notes:
        - array_find() more appropriate than array_search(), but not available in this PHP version
        - array_column($grades, 'name') would probably be faster than roster(), but can't resist
        - grade() is a bit ugly
        - can search for name unique among whole array, since instructions state names are globally unique; would be more realistic to search within desired grade via // if (!array_search(['grade' => $grade, 'name' => $name], $this->grades)){ // but hey
*/

class GradeSchool
{

    var $grades = [];
    
    public function add(string $name, int $grade): bool
    {
        // search for student among whole roster; add if not found
        if(!array_search($name, $this->roster())) {
            $this->grades[] = ['grade' => $grade, 'name' => $name];
            return true;
        } else { return false; }
    }

    public function grade(int $grade): array
    {
        // can't call roster() since it doesn't expect a parameter (I prefer not to modify or overload signatures for given methods in these exercises - note: PHP "overload" != rest of world "overload", though true overloading is entirely possible in PHP)

        // filter for grade; sort by name; return names
        $class = array_filter($this->grades, fn($student) => $student['grade'] == $grade);
        asort(array_column($class, 'name'));
        return array_column($class, 'name');
    }

    public function roster(): array
    {
        // sort by grade, then name
        array_multisort($this->grades, SORT_ASC, array_column($this->grades, 'grade'), SORT_ASC, array_column($this->grades, 'name'));
        return array_column($this->grades, 'name');
    }
}
