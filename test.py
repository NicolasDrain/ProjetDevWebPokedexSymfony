def courbeP1(n) :
    res = int(1.2*pow(n,3)-15*pow(n,2)+100*n-140)
    return res
fichier = open("test.txt", "w")
for i in range (1,101) :
    xpN1=str(courbeP1(i-1))
    xpN=str(courbeP1(i))
    y=str(i-1)
    fichier.write("if( "+xpN1+"<=$exp and $exp<"+xpN+") {\n    $niveau="+y+";\n}\n")
