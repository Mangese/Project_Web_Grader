#include<stdio.h>
#include<conio.h>
#include<time.h>
#include<stdlib.h>
#include<string.h>
unsigned long Fingerprint[65536];
unsigned long hash(unsigned char *str)
{
    unsigned long hash = 5381;
    int c;

    while (c = *str++)
        hash = ((hash << 5) + hash) + c; /* hash * 33 + c */

    return hash;
}
int state = 1;
char *trim(char *str)
{
    if( str == NULL ) { return NULL; }
    if( str[0] == '\0' ) {return str; }
    int len = strlen(str);
    int i;
    char x[1000000] = "";
    int j = 0;
    for(i=0;i<len;i++)
    {

                    if(str[i] == '/'&&str[i+1] == '/')
                    {
                        state = 2;
                    }
                    if(str[i] == '/'&&str[i+1] == '*')
                    {
                        state = 3;
                    }
                    if(str[i] == '*'&&str[i+1] == '/'&&state == 3)
                    {
                        state = 1;
                        i=i+2;
                    }
                    if(state == 2 && str[i]=='\n')
                    {
                        state = 1;
                    }
                    if(str[i] != ' ' && str[i]!='\n' && state == 1)
                    {
                    x[j]=tolower(str[i]);
                    j++;
                    }

    }
    return x;
}
main()
{

    char const* const fileName = "printstar.c";
    FILE* file = fopen(fileName, "r");
    char filename[100];
    scanf("%s",&filename);
    FILE* outfile = fopen("output.txt", "w");
    char line[256];
    char allchar[1000000] = "";
    char test_buffer[64];
    unsigned long window[20000];
    int index;
    int i;
    while (fgets(line, sizeof(line), file))
    {
    strcpy(test_buffer,trim(line));
    strcat(allchar,test_buffer);
    }
    int len = strlen(allchar);
    char temp[6];
    char num[12];
    int winnum = 0;
    for(i=0;i<len-5;i++)
    {
        memcpy(temp,allchar+i,5);
        unsigned long result = hash(temp);
        snprintf(num, 11, "%d", result);
        window[winnum] = result;
        winnum++;
    }
    int position[256];

    Fingerprint[0] = window[0];
    position[0]=0;
    for(i=1;i<4;i++)
    {
        if(window[i]<Fingerprint[0])
        {
            Fingerprint[0] = window[i];
            position[0] = i;
        }
    }
    int countFingerprint = 0;
    int countWindow = 1;
    for(i=1;i<winnum;i++)
    {
        countWindow++;
        if(window[i]<=Fingerprint[countFingerprint]&&i!=position[countFingerprint-1])
        {
            countFingerprint++;
            Fingerprint[countFingerprint] = window[i];
            position[countFingerprint] = i;
            countWindow = 1;
        }
        else if(countWindow>4)
        {
            countFingerprint++;
            Fingerprint[countFingerprint] = window[i];
            position[countFingerprint] = i;
            countWindow = 1;
        }
    }
    for(i=0;i<countFingerprint;i++)
    {
        printf("%d",Fingerprint[i]);
        if(i!=countFingerprint-1) printf(",");
    }
    fclose(file);
    fclose(outfile);
}
