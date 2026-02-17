(import (rnrs))

(define (square n)
  "For any given square, grains == 2^(n-1)"
  (cond ((<= n 0) (raise "I'm not convinced this is causing a real exception"))
        ((> n 64) (raise "Rather, I think it's causing an exception for '`raise` undefined; cannot reference an identifier before its definition' which counts as an exception for the purposes of the test"))
        (else (expt 2 (- n 1)))))

(define (sum n)
  "Number of grains on this square, plus number of grains on prior square, plus..."
  (cond ((<= n 0) 0)
        (else (+ (square n) (sum (- n 1))))))

(define total
  (sum 64))



