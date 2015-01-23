---
title: Python Functions for Arabic
author: mromanov
layout: post
permalink: /2013/01/python-functions-for-arabic/
categories:
  - Programming
tags:
  - Arabic
  - Python
---
There are certain operations one has to repeat many times while manipulating Arabic text. For a number of purposes Arabic text must be normalized, namely &#8220;noise&#8221; characters deleted, the orthography of problematic letters unified, etc. Sometimes it is necessary to deNormalize search words, i.e. modify regular expressions in such a way that orthographic possibilities are considered to the maximum degree. Some software does not work with Arabic characters, so it makes sense to transliterate Arabic text and work with English characters instead. Below are some functions that perform such operations.

<!--more-->

**Transliteration**  
Some programs do not support Arabic, but might be crucial for research (for example, R). This function converts Arabic into a transliterated form that any program can process.

<pre class="brush: python; title: ; notranslate" title="">def translitArabic(text):
    buckwalterMod = {
        'ء': 'c', 'ا': 'A', 'إ': 'A',
        'أ': 'A', 'آ': 'A', 'ب': 'b',
        'ة': 'o', 'ت': 't', 'ث': 'v',
        'ج': 'j', 'ح': 'H', 'خ': 'x',
        'د': 'd', 'ذ': 'V', 'ر': 'r',
        'ز': 'z', 'س': 's', 'ش': 'E',
        'ص': 'S', 'ض': 'D', 'ط': 'T',
        'ظ': 'Z', 'ع': 'C', 'غ': 'g',
        'ف': 'f', 'ق': 'q', 'ك': 'k',
        'ل': 'l', 'م': 'm', 'ن': 'n',
        'ه': 'h', 'ؤ': 'c', 'و': 'w',
        'ى': 'y', 'ئ': 'c', 'ي': 'y',
        }
    for k, v in buckwalterMod.items():
        text = re.sub(k, v, text)
    return(text)
</pre>

*Example:*  
Input:

<pre class="brush: python; title: ; wrap-lines: true; notranslate" title="">testLine = "إن القراء يقرؤون القرآن قراءة جميلة"
print(translitArabic(testLine))
</pre>

Output:

<pre class="brush: python; title: ; wrap-lines: true; notranslate" title="">An AlqrAc yqrcwn AlqrAn qrAco jmylo
</pre>

**Normalization**  
The function unifies the orthography of *alif*s, *hamza*s, and *ya*s/*alif maqsura*s. This is just a basic function that might need to be modified and expanded for specific purposes.

<pre class="brush: python; title: ; notranslate" title="">def normalizeArabic(text):
    text = re.sub("[إأٱآا]", "ا", text)
    text = re.sub("ى", "ي", text)
    text = re.sub("ؤ", "ء", text)
    text = re.sub("ئ", "ء", text)
    return(text)
</pre>

*Example:*  
Input:

<pre class="brush: python; title: ; notranslate" title="">testLine = "إن القراء يقرؤون القرآن قراءة جميلة"
print(normalizeArabic(testLine))
</pre>

Output:

<pre class="brush: python; title: ; notranslate" title="">ان القراء يقرءون القران قراءة جميلة
</pre>

**deNormalization**  
This function converts search words into a regular expression that considers most common spelling variations/typos (for example القران and القرآن). Modifications of *ta marbuta* and *hamza*s might require modifications, depending on research purposes.

<pre class="brush: python; title: ; notranslate" title="">def deNormalize(text):
    alifs           = '[إأٱآا]'
    alifReg         = '[إأٱآا]'
    # -------------------------------------
    alifMaqsura     = '[يى]'
    alifMaqsuraReg  = '[يى]'
    # -------------------------------------
    taMarbutas      = 'ة'
    taMarbutasReg   = '[هة]'
    # -------------------------------------
    hamzas          = '[ؤئء]'
    hamzasReg       = '[ؤئءوي]'
    # Applying deNormalization
    text = re.sub(alifs, alifReg, text)
    text = re.sub(alifMaqsura, alifMaqsuraReg, text)
    text = re.sub(taMarbutas, taMarbutasReg, text)
    text = re.sub(hamzas, hamzasReg, text)
    return text
</pre>

Input:

<pre class="brush: python; title: ; notranslate" title="">testLine = "إن القراء يقرؤون القرآن قراءة جميلة"
print(deNormalize(testLine))
</pre>

Output:

<pre class="brush: python; title: ; notranslate" title="">[إأٱآا]ن [إأٱآا]لقر[إأٱآا][ؤئءوي] [يى]قر[ؤئءوي]ون [إأٱآا]لقر[إأٱآا]ن قر[إأٱآا][ؤئءوي][هة] جم[يى]ل[هة]
</pre>

**Noise Removal**  
This function removes short vowels and other symbols (*harakat*) that interfere with computational manipulations with Arabic texts.

<pre class="brush: python; title: ; notranslate" title="">def deNoise(text):
    noise = re.compile(""" ّ    | # Tashdid
                             َ    | # Fatha
                             ً    | # Tanwin Fath
                             ُ    | # Damma
                             ٌ    | # Tanwin Damm
                             ِ    | # Kasra
                             ٍ    | # Tanwin Kasr
                             ْ    | # Sukun
                             ـ     # Tatwil/Kashida
                         """, re.VERBOSE)
    text = re.sub(noise, '', text)
    return text
</pre>

Input:

<pre class="brush: python; title: ; notranslate" title="">testLine = "إِنَّ الْقُرَّاْءَ يَقْرَؤُوْنَ الْقُرْآنَ قِرَاْءَةً جَمِيْلَــــــةً"
print(deNoise(testLine))
</pre>

Output:

<pre class="brush: python; title: ; notranslate" title="">إن القراء يقرؤون القرآن قراءة جميلة
</pre>