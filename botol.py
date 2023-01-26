botol = []
for i in range(1,100):
    botol.append("negtif")

print(botol)
botol.append("positif")
print(botol)
botolke=0
#hari 1 1 strep di isi dengan 2 tetes botol yang berbeda
for j in range(5):
    for n in range(20):
        if botol[n] == "negatif":
            del botol[n]
            botolke+=1
        elif botol[n] == "positif":
            print("ditemukan")


print(len(botol))
