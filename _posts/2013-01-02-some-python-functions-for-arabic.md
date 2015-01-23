---
layout: post
title:  "Some Python Functions for Arabic"
date:   2013-01-02 19:52:10
author: Maxim Romanov
categories: jekyll update
---
There are certain operations one has to repeat many times while manipulating Arabic text. For a number of purposes Arabic text must be normalized, namely “noise” characters deleted, the orthography of problematic letters unified, etc. Sometimes it is necessary to deNormalize search words, i.e. modify regular expressions in such a way that orthographic possibilities are considered to the maximum degree. Some software does not work with Arabic characters, so it makes sense to transliterate Arabic text and work with English characters instead. Below are some functions that perform such operations.

Transliteration

Some programs do not support Arabic, but might be crucial for research (for example, R). This function converts Arabic into a transliterated form that any program can process. 

{% highlight python %}
def translitArabic(text):
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
{% endhighlight %}

Example input:

{% highlight ruby %}
testLine = "إن القراء يقرؤون القرآن قراءة جميلة"
print(translitArabic(testLine))
{% endhighlight %}

Check out the [Jekyll docs][jekyll] for more info on how to get the most out of Jekyll. File all bugs/feature requests at [Jekyll’s GitHub repo][jekyll-gh]. If you have questions, you can ask them on [Jekyll’s dedicated Help repository][jekyll-help].

[jekyll]:      http://jekyllrb.com
[jekyll-gh]:   https://github.com/jekyll/jekyll
[jekyll-help]: https://github.com/jekyll/jekyll-help
