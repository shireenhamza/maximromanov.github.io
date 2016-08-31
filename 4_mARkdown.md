---
layout: page
title: 'mARkdown'
description: "Tagging Arabic Historical Texts"
permalink: /mARkdown/
---

<section class="post-topmatter">

<section class="share"> 
<a class="icon-twitter" href="http://twitter.com/share?text=About Maxim Romanov&amp;url=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;">
<span class="hidden">Twitter</span>
</a>
<a class="icon-facebook" href="https://www.facebook.com/sharer/sharer.php?u=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;">
<span class="hidden">Facebook</span>
</a>
<a class="icon-google-plus" href="https://plus.google.com/share?url=http://maximromanov.github.io/about/"
onclick="window.open(this.href, 'google-plus-share', 'width=490,height=530');return false;">
<span class="hidden">Google+</span>
</a>
</section>

</section>


The main goal of **mARkdown** is to provide a simple system for tagging structural elements in premodern and early modern Arabic texts that are being prepared within the framework of the [OpenArabic Project](https://github.com/OpenArabic). that would facilitate algorithmic analysis in the same way (and even more efficiently) as more complex TEI XML does. In principle, **mARkdown** does not require any special editor, but the current implementation relies on EditPad Pro, which supports right-to-left languages, Unicode, and large files. However, it is the support of custom highlighting and navigation schemes that makes this text editor particularly convenient for **mARkdown**.


# Very Short Intro

1. Download and install [EditPad Pro](http://www.editpadpro.com/); unfortunatey, **EditPad Pro** is for Windows only; if you are using Mac or Linux, you can still use it with some virtualization option.
2. Download **mARkdown** schemes from GitHub ([https://github.com/maximromanov/mARkdown](https://github.com/maximromanov/mARkdown)), and unzip, and copy all the files into `%APPDATA%\JGsoft\EditPad Pro 7` (make sure that EditPad Pro in not running: you need to do `File > Exit` to completely close it).
3. Texts in the repositories of the [OpenArabic Project](https://github.com/OpenArabic) have already been preprocessed. Opening any of these texts in EditPad Pro should automatically activate **mARkdown** scheme.
4. The goal is to tag the structure of a text, which boils down to:
	1. the headers of chapters (`### | `), sections (`### ||`), subsections (`### ||| `), etc.
	2. and information units: biographies (`### $ `), descriptions of events (`### @ `), and dictionary entries (also `### $ `)
	3. If a structural/logical unit is tagged correctly, the color of the tagged unit will change.
5. Tagging must be done through the collation of the electronic text of a book with the printed edition on which the electronic text is based. Most editions can be easily found online as PDF files (‘googling’ the title usually brings up a lot of results; PDFs are most likely to be on [Archive.org](https://archive.org/)) 


# Detailed Description

## Using **mARkdown** in EditPad Pro

[EditPad Pro](http://www.editpadpro.com/) is a commercial text editor for Windows. It can be used on Mac and Linux through some virtualization solution (for example, Parallels or Fusion on Mac, or Wine on Linux). You can download a fully functional trial version to try **mARkdown** (it, however, will not work with EditPad Lite, a free light-weight version of the same text editor).

The most recent **mARkdown** settings files for EditPad Pro can be found in the [mARkdown repository](https://github.com/maximromanov/mARkdown) on GitHub. You can download the entire repository or just the `*.zip` file (the date is in the filename: `YYYYMMDD_HHMMSS.zip`). Unzip its content, and copy all the files into `%APPDATA%\JGsoft\EditPad Pro 7`. You will need to restart the program (use: `File > Exit`). If **mARkdown** settings work, the main window should look as shown below. Note the yellow-ish color of the main window and a large Find/Replace panel on the right).

<figure class="fit">
	<a href="{{ site.url }}/images/md/editPadPro.png" title="">
	<img src="{{ site.url }}/images/md/editPadPro.png">
	</a>
	<figcaption>
		EditPad Pro with <b>mARkdown</b> settings installed
	</figcaption>
</figure>

In a text file, **mARkdown** is activated by the “magic value” at the beginning of the text file, which is `#####ARABICA#`. (In other words, the very first line of the text should consist exclusively of this value.) The highlighting scheme relies on regular expressions (RE) to color a limited number of pattern in the text.  

**Note**: You can try `test_textFile` from the github repository. The file does not have an extension to avoid accidental opening in Notepad—the default text editor on Windows, which cannot handle large files. Drug-n-drop the file onto EditPad Pro to open it. The **mARkdown** should be automatically activated. (If you start a new file, you may need to reopen it after adding the “magic value”.)

<figure class="fit">
	<a href="{{ site.url }}/images/md/magicValue.png" title="">
	<img src="{{ site.url }}/images/md/magicValue.png">
	</a>
	<figcaption>
		<b>mARkdown</b> activated with the “magic value” in <b>test_textFile</b>
	</figcaption>
</figure>

# General description

**mARkdown** includes structural elements and in-text elements—all are highlighted with different colors. This helps one to avoid mistakes while tagging texts, and, additionally, makes the structure of the text easily discernible to the human eye. Configured in a custom highlighting scheme, all elements are activated with regular expressions (RE).

EditPad Pro also supports folding of structural elements that span over multiple lines. This allows one to contract—or fold—the entire text into a table of content and then open—or unfold—only elements that one wants to work with.

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown02.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown02.gif">
	</a>
	<figcaption>
		EditPad Pro and <b>mARkdown</b>: Folding and Unfolding
	</figcaption>
</figure>


# I. Structural elements

## 1. Metadata

_description to be added..._

## 2. Headers (RE: `^### \|+ `)

Headers are for the titles of main structural units, like chapters, subchapters, etc. The entire header must be on one line and must include three main elements:

1. `###` — three hashtags at the beginning of the line;
2. `|` — pipes, whose number corresponds to the level of a header;
3. `Header` — the text of a header (followed by `\n`, “new line” character)


```
### | First Level Header (red)

### || Second Level Header (orange)

### ||| Third Level Header (yellow)

### |||| Fourth Level Header (green)

### ||||| Fifth Level Header (blue)
```

A gif-image below shows how headers get highlighted with different colors when tagged properly. Colors follow the rainbow spectre (they stop changing after Level V):  

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown01.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown01.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Tagging headers of different level
	</figcaption>
</figure>


## 3. Information Units (RE: _multiple_)

Most of the texts that I have worked with so far have a very clear structure (chapters > subchapters > subsubchapters, etc.), where the lowest level structural units (subchapters or subsubchapters) are made of “information units,” such as biographies in biographical collections, descriptions of events in chronicles, and dictionary entries (on lexical items, names, toponyms, book titles, etc.)

Using **mARkdown**, one needs only to mark the beginning of each information unit. Each unit can be marked with either a simplified or full tag. Simplified tags are short, which makes them ideal for manual tagging. Simplified tags are, however, ambiguous. Full tags are more readable and source independent. Full tags are particularly important when information from multiple sources is processed at the same time.

**mARkdown** has been first developed for biographical collections, chronicles, bibliographical collections, and dictionaries of different types. In most cases, these sources contain one type of information units and in such cases one can use only one type of tag `### $ [information unit]`, which can be later converted—using find/replace—into corresponding full tags. Below is the description of used tags.

### 3.1 Dictionaries (RE: _multiple_)

Arabic dictionaries usually include information units of the same types, so one simplified tag—`### $ [a dictionary item]`—is sufficient. The full tags depend on the nature of each dictionary and at the moment include “descriptive names,” toponyms, lexical items, and book titles. Tags for them are as follows:

~~~
### $DIC_NIS$ [a descriptive name entry]

### $DIC_TOP$ [a toponym entry]

### $DIC_LEX$ [a lexical entry]

### $DIC_BIB$ [a book title]
~~~



### 3.2 Biographical Collections and Chronicles (RE: _multiple_)

Biographical collections often include several types of information units. Moreover, there are plenty of sources that combine features of both biographical collections and chronicles (“obituary chronicles”), so one often has to deal with a variety of information units in the same text. For this reason, the main simplified tags are as follows:

~~~
### $ [a biography of a man]

### $$ [a biography of a woman]

### $$$ [a cross-reference and/or repetition, for both men and women]

### $$$$ [a list of names]

### @ [a historical event]

### @ RAW [a batch of historical events]

~~~

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_bio1.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_bio1.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Tagging biographical units with simplified tags
	</figcaption>
</figure>

**NB**: `### @ RAW` can be used to tag blocks of historical events when it is not immediately clear when one information unit ends and another begins. With these tags in place, one can return to an unfinished batch later, read it more carefully, and split properly into single units. There is also, of course, a conceptual and methodological issue with regard to what constitutes an ‘event’. For the purposes of algorithmic analysis, [the “description of an] event” is a structurally and thematically complete unit of text that describes an entity that has 5 properties: subject, predicate, object, time and place. In other words, it is something that can be grouped into categories, graphed across time, and mapped in space.

Full tags are as follows:

~~~
### $BIO_MAN$ [a biography of a man]

### $BIO_WOM$ [a biography of a woman]

### $BIO_REF$ [a cross-reference, for both men and women]

### $BIO_NLI$ [a list of names]

### $CHR$ [a historical event]

### $CHR_RAW$ [a batch of historical events]

~~~

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_bio2.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_bio2.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Tagging biographical units with full tags. You can see here how first the unit is not highlighted because of a typo. You can also see one of the common problems that come from combining RTL and LTR text—visually the tags look like they were not typed properly (<b>BIO_MAN$</b>, instead <b>$BIO_MAN$</b>). 
	</figcaption>
</figure>

## 2. In-text elements

### 2.1 Paragraphs (RE: `^# `)

In premodern Arabic texts paragraphs as units are not particularly reliable. Yet, if a certain electronic text reproduces a printed edition, it is worth preserving its division into paragraphs. Each paragraph begins with `#`.

While EditPad Pro handles large files very well, it has problems with long paragraphs (or, more correctly, lines). For this reason, long paragraphs are split into shorter lines, where each line starts with `~~` (two tildas).

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_par.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_par.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Dealing with paragraphs
	</figcaption>
</figure>

### 2.2 Poetry (RE: `^# .*? % % .*? $`)

Poetry lines can be tagged in the following manner: one line of poetry per line/paragraph, with hemistiches divided with `% %` .

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_poetry.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_poetry.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Tagging poetry
	</figcaption>
</figure>

### 2.3 Qur’anic verses (RE: `@QB@ .*? @QE@`)

Qur’anic verses can be tagged in the following manner: 1) `@QB@`—at the beginning of a verse; 2) `@QE@`—at the end.

**NB**: it is not recommended to tag verses of the Qurʾān at this point; the tags that may occur in the existing texts simply preserve residual and inconsistent tagging of Qurʾānic verses in the initial versions of texts.

_an image to be added_

### 2.4 Page numbers (RE: `PageV\d\dP\d\d\d`)

Most of electronic texts preserve page numbers. **mARkdown** supports the following format `PageV##P###`, where `V##` is the volume number, and `P###` is the page number. Volume number must be two digits, page number—three (padded with zeros when necessary). Thus, `PageV05P022` stands for Vol. 5, p.22. Page number tags are inserted at the end of the corresponding page.


### 2.5 Footnotes & Endnotes (RE: `NoteV\d\dP\d\d\dN\d\d`)

In a very similar manner notes—both footnotes and endnotes—can be tagged: `NoteV##P###N##`, where `V##` is the volume number, and `P###` is the page number, and `N##` is the note number. The content of notes is put into the end of the text, as endnotes. 

_to be updated_

### 2.6 Miscellanea (RE: non-Arabic letters, numbers, punctuation)

All non-letter characters are automatically highlighted as elements that may have some value for the structural understanding of a text. These include: punctuation, numbers, non-Arabic letters.


# 3. Analytical Patterns

**mARkdown** also includes a series of patterns/tags to highlight results generated with/for algorithmic analysis. Unlike previous elements, these additions to the text that are either generated automatically, or inserted manually.  

## 3.1 Geographical information

Geographical texts—such as comprehensive geographies—contain a lot of data that can be used for modeling historical processes in space. Of particular importance are administrative divisions and trade routes, which often come with distances.

### 3.1.1 Administrative divisions (RE: `#\$#(PROV|REG\d)# .*? #\$#TYPE .*? #\$#(REG\d|STTL) ([\w# ]+) $`)

Most descriptions fit into the following scheme `WORLD: PROVINCE > TYPE > (REGION) > TYPE > SETTLEMENT`. In the actual text, relevant information is tagged essentially as ‘triples’ of `SUBJECT > PREDICATE > OBJECT` (with multiple OBJECTs that will be parsed out at a later stage):

~~~
#$#PROV toponym #$#TYPE type_of_region #$#REG1 (toponym #)+

#$#REGX toponym #$#TYPE type_of_region #$#REGX (toponym #)+
 
#$#REGX toponym #$#TYPE type_of_settlement #$#STTL (toponym #)+ 
~~~

**Note**: _Clip collection_ can be used to insert relevant patterns into the text.

<figure class="fit">
	<a href="{{ site.url }}/images/md/analytical_divisions.png" title="">
	<img src="{{ site.url }}/images/md/analytical_divisions.png">
	</a>
	<figcaption>
		<b>mARkdown</b> pattern for describing administrative divisions; using Clip Collection (on the left) one can insert a relevant pattern into the text and fill it in 
	</figcaption>
</figure>

### 3.1.2 Routes and distances (RE: `#$#FROM .*? #$#TOWA .*? #$#DIST .*`)

Route sections with distances are tagged in the following manner:

~~~
#$#FROM toponym #$#TOWA toponym #$#DIST distance_as_recorded
~~~

<figure class="fit">
	<a href="{{ site.url }}/images/md/analytical_distances.png" title="">
	<img src="{{ site.url }}/images/md/analytical_distances.png">
	</a>
	<figcaption>
		<b>mARkdown</b> pattern for describing routes and distances
	</figcaption>
</figure>

## 3.2 Named Entities (Added: April 22, 2016)

At the moment these include toponyms (`@TOPXX` and `@TXX`), individuals (`@PERXX` and `@PXX`) and social/onomastic/biographical characteristics (`@SOCXX` and `@SXX`).

All tags have similar structure `@` + `CODE` + two numbers. `CODE`s have two variations: 1) long (three letters) and 2) short (one letter). Triliteral `CODE`s are used for automatic tagging with scripts and entity lists; one-letter short `CODE`s are used for manual tagging and disambiguation of automatic tags.

`XX`, two numbers, indicate:

1. the length of an attached prefix. For example, if `wa-` or `bi-` are attached to an entity, the first number must be `1`, which means that 1 character from the beginning must be removed)
2. the length of the entity. If the entity is a bigram (*Madīnaŧ al-Salām*), number `2` must be used (both words will be automatically highlighted).

### 3.2.1 Toponyms

1. Automatic long tag: `@TOPXX`
2. Manual short tag: `@TXX`

### 3.2.2 Persons/Individuals

1. Automatic long tag: `@PERXX`
2. Manual short tag: `@PXX`

### 3.2.3 Biographical characteristics

1. Automatic long tag: `@SOCXX`
2. Manual short tag: `@SXX`

### 3.3 Tagging *Riwayāt*

Each *riwāyaŧ*/*ḥadīṯ* report should be treated as a separate paragraph: `new line + # $RWY$ `; in order to demarkate the boundary between *isnād* and *matn*, `@MATN@` tag is to be inserted between *isnād* and *matn*. Since it is not uncommon to have an evaluation of reported material, tag `@HUKM@` can be used to tag the beginning of the *ḥukm*-statement. All three elements of a *riwāyaŧ/ḥadīṯ* must remain the part of the same `paragraph`.

```
# $RWY$ this section contains isnād @MATN@ this section contains matn @HUKM@ this section contains ḥukm .
``` 

It is not uncomon that either *isnād* or *matn* is missing. In such cases `@MATN@` tag still must be inserted: in the case of missing *isnād*, `@MATN@` directly follows `# $RWY$ `; in the case of missing *matn*, `@MATN@` becomes the last element in the *ḥadīṯ* paragraph. `@HUKM@` is optional and inserted only when there is a *ḥukm*-statement.


_to be continued_