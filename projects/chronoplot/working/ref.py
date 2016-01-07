import re

def buildDic(fr, to, st):
    dic = {}
    for i in range(fr,to,st):
        key = "%05d" % i
        dic[key] = "00000"
    #print(dic)
    return(dic)

def reformat():
    file = "data50_RAW.js"

    newData= []
    
    with open(file, "r", encoding="utf8") as f1:
        json = f1.read()

        json = json.replace("Shamela", "sha")
        json = json.replace("Shia", "shi")
        json = json.replace("JK", "jk")
        json = json.replace("Vols", "")
        
        json = json.split("},\n")

        for j in json:
            #print(j)
            #print("=============")
            
            nameDate = re.search(r"\"phonetic\":\"(.*?)\|", j).group(1)
            #print(nameDate)

            # dates
            dates = re.search("timeseries\":(.*)", j).group(1)
            dates = dates.replace("0,", "0:").replace("[", "").replace("]", "")
            datesNum = re.sub("\d+:|,$", "", dates)
            datesNum = re.findall("\d+", datesNum)
            datesNum = list(map(int, datesNum))
            #print(datesNum)
            #print("SortingVar__%09d\n" % sum(datesNum))

            # update dates
            dates = dates[:-1].split(",")
            dh = buildDic(0, 1450, 50)
            for d in dates:
                n = d.split(":")
                key = "%05d" % int(n[0].strip())
                dh[key] = "%05d" % int(n[1])

            dhRef = []
            for k,v in dh.items():
                dhRef.append("%s,%s" % (k,v))

            dhRef = '[[%s]]' % "],[".join(sorted(dhRef))
            
            #print(dates)
            #print(dh)
            #print(dhRef)

            #print("=============")
            newJ = j
            newJ = re.sub('"timeseries":.*', '"timeseries":%s,' % dhRef, newJ)
            newJ = re.sub(r"(\"description\":).*,\n", r'\1"%s",\n' % nameDate, newJ)
            newJ = "SortingVar__%09d\n" % sum(datesNum) + newJ

            newData.append(newJ)
            
            #sinput(newJ)

    newData = sorted(newData, reverse=True)
    newData = "},\n".join(newData)
    newData = re.sub(r"\b0{1,4}", "", newData)

    newData = re.sub("SortingVar__\d+\n", "", newData)

    newData100 = re.sub("\[0,\d+\],\[50,\d+\],\[100,\d+\],", "[0,0],[50,0],[100,0],", newData)
    with open("data50_byDates.js", "w", encoding="utf8") as f9:
        f9.write("var RAW = {\n%s\n}\n}" % newData)

    with open("data50_byDates100.js", "w", encoding="utf8") as f9:
        f9.write("var RAW = {\n%s\n}\n}" % newData100)
        
reformat()



print("Tada!")
        
