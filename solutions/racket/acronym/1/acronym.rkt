#lang racket

(provide acronym)

; if a string is just a list of chars, then we want to replace hyphens w/spaces, then replace all other punctuation, then split, then take heads of each list and uppercase

(define (acronym string)
  (string-join
  (map (lambda (s)
       (substring s 0 1))
       (string-split
       (string-titlecase
       (regexp-replace* #rx"-"
       (regexp-replace* #rx"_" string "") " ")))) ""))

; Couldn't get builtin punctuation check working, skipping