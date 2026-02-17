(defpackage :collatz-conjecture
  (:use :cl)
  (:export :collatz))

(in-package :collatz-conjecture)

; n even: (/ n 2)
; n odd: (+ 1 (* n 3))
(defun collatz (n)
 (collatz-count n 0)
  )
  

; It wants the steps required; how to do without passing a counter in?
; Not sure; so hijack the expected function
(defun collatz-count (n c)
  (if (<= n 0) nil
      (if (<= n 1) c
          (if (= 0 (mod n 2)) (collatz-count (/ n 2) (+ c 1))
              (collatz-count (+ 1 (* n 3)) (+ c 1)))))
  
  )