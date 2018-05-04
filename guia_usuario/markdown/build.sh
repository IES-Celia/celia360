#!/bin/bash
INPUT=index.md
OUTPUT_PDF=pdf/index.pdf
OUTPUT_HTML=html/index.html

pandoc $INPUT -o $OUTPUT_PDF\
    --template templates/eisvogel.tex\
    -V mainfont="SourceSansPro-Regular"\
    -V mainfontoptions="Scale=1.0"\
    --listings\
    --pdf-engine=xelatex\
    --number-sections\
    -V lang=es\
    --tab-stop 2 -s\
    --toc --toc-depth=5

pandoc $INPUT -o $OUTPUT_HTML\
    --template templates/GitHub.html5\
    --self-contained\
    --listings\
    --number-sections\
    -V lang=es\
    --tab-stop 2 -s\
    --toc --toc-depth=5