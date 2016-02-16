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


The main goal of **mARkdown** is to provide a simple system for tagging structural elements in Arabic texts that would facilitate algorithmic analysis in the same way as more complex TEI XML does. In principle, **mARkdown** does not require any special editor, but my current workflow relies on EditPad Pro, which supports right-to-left languages, Unicode, and large files. However, it is the support of custom highlighting and navigation schemes that makes this text editor particularly convenient for **mARkdown**.


# Very Short Description

1. Download and install [EditPad Pro](http://www.editpadpro.com/) (Windows only).
2. Download **mARkdown** schemes from [GitHub](https://github.com/maximromanov/mARkdown), and unzip into `%APPDATA%\JGsoft\EditPad Pro 7`
3. Text that you will be working with have already been preprocessed. Opening any of these texts in EditPad Pro will automatically activate **mARkdown** scheme.
4. The goal is to tag the structure of a text, which boils down to:
	1. the headers of chapters (`### | `), sections (`### ||`), subsections (`### ||| `), etc.
	2. and information units: biographies (`### $ `), descriptions of events (`### @ `), and dictionary entries (also `### $ `)
	3. If an element is tagged correctly, its color will change.
5. This must be done through the collation of the electronic text of a book with the printed edition on which the electronic text is based. Most of these editions can be found online as PDF files (‘googling’ the title usually brings up a lot of results; PDFs are most likely to be on [Archive.org](https://archive.org/)) 



# Detailed Description

## Using **mARkdown** in EditPad Pro

[EditPad Pro](http://www.editpadpro.com/) is a commercial text editor for Windows. It can be used on Mac and Linux through some virtualization solution (for example, Parallels or Fusion on Mac, or Wine on Linux). You can download a fully functional trial version to try **mARkdown** (it, however, will not work with EditPad Lite, a free light-weight version of the same text editor).

The most recent **mARkdown** settings files for EditPad Pro can be found in the [mARkdown repository](https://github.com/maximromanov/mARkdown) on GitHub. Download the latest `*.zip` file (the date is in the filename: `YYYYMMDD_HHMMSS.zip`) and unzip its content into `%APPDATA%\JGsoft\EditPad Pro 7`. You may need to restart the program (use: **File** > **Exit**). If **mARkdown** settings work, the main window should look as shown below. Note the yellow-ish color of the main window and a large Find/Replace panel on the right).

<figure class="fit">
	<a href="{{ site.url }}/images/md/editPadPro.png" title="">
	<img src="{{ site.url }}/images/md/editPadPro.png">
	</a>
	<figcaption>
		EditPad Pro with <b>mARkdown</b> settings installed
	</figcaption>
</figure>

In a text file, **mARkdown** is activated by the “magic value” at the beginning of the text file, which is `#####ARABICA#`. (In other words, the very first line of the text should consist of this value.) The highlighting scheme relies on regular expressions (RE) to color a limited number of pattern in the text.  

**Note**: You can try `test_textFile` from the gitHub repository. The file does not have an extension to avoid accidental opening in Notepad—the default text editor on Windows, which cannot handle large files. Drug-n-drop the file onto EditPad Pro to open it. The **mARkdown** should be automatically activated. (If you start a new file, you may need to reopen it after adding the “magic value”.)

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

EditPad Pro also supports folding of structural elements that span over multiple lines. This allows one to contract the entire text into a table of content and then open—or unfold—only elements that one wants to work with.

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

Using **mARkdown**, one needs only to mark the beginning of each information unit. Each unit can be marked with either a simplified or full tag. Simplified tags are short, which makes them ideal for manual tagging. Simplified tags are, however, ambiguous, which is resolved with full tags. Full tags are also more readable and source independent. Full tags are particularly important when information from multiple sources is processed at the same time.

**mARkdown** has been developed primarily for biographical collections, chronicles, bibliographical collections, and dictionaries of different types. In most cases, these sources contain one type of information units and in such cases one can use only one type of tag `### $ [information unit]`, which can be later converted—using find/replace—into corresponding full tags. Below is the description of used tags.

### 3.1 Dictionaries (RE: _multiple_)

Arabic dictionaries usually include information units of the same types, so one simplified tag—`### $ [a dictionary item]`—is sufficient. The full tags depend on the nature of each dictionary and at the moment include “descriptive names,” toponyms, lexical items, and book titles. Tags for them are as follows:

```
### $NIS$ [a descriptive name entry]

### $TOP$ [a toponym entry]

### $LEX$ [a lexical entry]

### $BIB$ [a book title]
```



### 3.2 Biographical Collections and Chronicles (RE: _multiple_)

Biographical collections often include several types of information units. Moreover, there are plenty of sources that combine features of both biographical collections and chronicles (“obituary chronicles”), so one often has to deal with a variety of information units in the same text. For this reason, the main simplified tags are as follows:

```
### $ [a biography of a man]

### $$ [a biography of a woman]

### $$$ [a cross-reference and/or repetition, for both men and women]

### $$$$ [a list of names]

### @ [a historical event]

### @ RAW [a batch of historical events]

```

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_bio1.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_bio1.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Tagging biographical units with simplified tags
	</figcaption>
</figure>

**NB**: `### @ RAW` can be used to tag blocks of historical events when it is not immediately clear when one information unit ends and another begins. With these tags in place, one can return to an unfinished batch later, read it more carefully, and split properly into single units. There is also, of course, a conceptual and methodological issue with regard to what constitutes an ‘event’. For the purposes of algorithmic analysis, [the “description of an] event” is a structurally and thematically complete unit of text that describes an entity that has such properties as actor, action, time and place. In other words, it is something that can be grouped into categories, graphed across time, and mapped in space.

Full tags are as follows:

```
### $BIO_MAN$ [a biography of a man]

### $BIO_WOM$ [a biography of a woman]

### $BIO_REF$ [a cross-reference, for both men and women]

### $BIO_NLI$ [a list of names]

### $CHR$ [a historical event]

### $CHR_RAW$ [a batch of historical events]

```

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

In premodern Arabic texts paragraphs are not particularly reliable. Yet, if a certain electronic text reproduced a printed edition, it is worth preserving its division into paragraphs. Each paragraph begins with `#`.

While EditPad Pro handles large files very well, it has problems with long paragraphs (lines). For this reason, long paragraphs can be split into shorter lines, where each line will begin with `~~` (two tildas).

<figure class="fit">
	<a href="{{ site.url }}/images/md/mARkdown_par.gif" title="">
	<img src="{{ site.url }}/images/md/mARkdown_par.gif">
	</a>
	<figcaption>
		<b>mARkdown</b>: Dealing with paragraphs
	</figcaption>
</figure>

### 2.2 Poetry (RE: `^# .*? % % .*? $`)

Poetry lines can be tagged in the following manner: 1) one line of poetry per line; 2) the hemistiches are divided with `% %` .

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

_an image to be added_

### 2.4 Page numbers (RE: `PageV\d\dP\d\d\d`)

Most of electronic texts preserve page numbers. **mARkdown** supports the following format `PageV##P###`, where `V##` is the volume number, and `P###` is the page number. Volume number must be two digits, page number—three (padded with zeros when necessary). Thus, `PageV05P022` stands for Vol. 5, p.22.


### 2.5 Footnotes & Endnotes (RE: `NoteV\d\dP\d\d\dN\d\d`)

In a very similar manner notes—both footnotes and endnotes—can be tagged: `NoteV##P###N##`, where `V##` is the volume number, and `P###` is the page number, and `N##` is the note number. The content of notes is put into the end of the text, as endnotes. 

_to be updated_

### 2.6 Miscellanea (RE: non-Arabic letters, numbers, punctuation)

All non-letter characters are automatically highlighted as elements that may have some value for the structural understanding of a text. These include: punctuation, numbers, non-Arabic letters.


# 3. Analytical Patterns

**mARkdown** also includes a series of patterns/tags to highlight results generated with/for algorithmic analysis. Unlike previous elements, these additions to the text that are either generated automatically, or inserted manually.  

## 3.1 Geographical information

Geographical texts—such as comprehensive geographies—contain a lot of data that can be used for modeling historical processes in space. Of particular importance are administrative divisions and trade routes, which often come with distances.

### 3.1.3 Toponyms in the text (RE: `@TOP\d\d@`)

This tag can be used to tag toponyms in a text. The tag consists of `TOP` followed by two numbers, and the entire code is wrapped into `@`-signs. The first number designates the length of the prefix which is not part of a toponym and which must be dropped. The second number is the length of the toponym in words. See the example below.

<figure class="fit">
	<a href="../images/md/md_top_tag.gif" title="">
	<img src="../images/md/md_top_tag.gif">
	</a>
	<figcaption>
		<b>@TOPXX@ pattern</b> for tagging toponyms; as shown in the example, to tag <i>Tirmiḏ</i>, which has no prefixes and is 1-word long, you add tag <code>@TOP01@</code>; to tag <i>wa-Mā warāʾ al-nahr</i>, you add <code>@TOP13@</code>, to take into account a one-letter prefix (<i>wa-</i>) and include all the three words of the toponym.
	</figcaption>
</figure> 

### 3.1.2 Administrative divisions (RE: `#\$#(PROV|REG\d)# .*? #\$#TYPE .*? #\$#(REG\d|STTL) ([\w# ]+) $`)

Most descriptions fit into the following scheme `WORLD: PROVINCE > TYPE > (REGION) > TYPE > SETTLEMENT`. In the actual text, relevant information is tagged essentially as ‘triples’ of `SUBJECT > PREDICATE > OBJECT` (with multiple OBJECTs that will be parsed out at a later stage):

```
#$#PROV toponym #$#TYPE type_of_region #$#REG1 (toponym #)+

#$#REGX toponym #$#TYPE type_of_region #$#REGX (toponym #)+
 
#$#REGX toponym #$#TYPE type_of_settlement #$#STTL (toponym #)+ 
```

**Note**: _Clip collection_ can be used to insert relevant patterns into the text.

<figure class="fit">
	<a href="{{ site.url }}/images/md/analytical_divisions.png" title="">
	<img src="{{ site.url }}/images/md/analytical_divisions.png">
	</a>
	<figcaption>
		<b>mARkdown</b> pattern for describing administrative divisions; using Clip Collection (on the left) one can insert a relevant pattern into the text and fill it in 
	</figcaption>
</figure>

### 3.1.3 Routes and distances (RE: `#$#FROM .*? #$#TOWA .*? #$#DIST .*`)

Route sections with distances are tagged in the following manner:

```
#$#FROM toponym #$#TOWA toponym #$#DIST distance_as_recorded
```
<figure class="fit">
	<a href="{{ site.url }}/images/md/analytical_distances.png" title="">
	<img src="{{ site.url }}/images/md/analytical_distances.png">
	</a>
	<figcaption>
		<b>mARkdown</b> pattern for describing routes and distances
	</figcaption>
</figure>



_to be continued_