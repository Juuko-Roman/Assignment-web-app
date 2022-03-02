#include<stdio.h>
#include<stdlib.h>
#include<windows.h>
#include<conio.h>
#include<string.h>
#include<mysql.h>
#include<time.h>
//time variables
  time_t currentTime;

//HEADER FUNCTION
void header()
{
    time(&currentTime);
    time_t t=ctime(&currentTime);
    printf("\r \n\t\t\t\t\t\t\t\t\t\t\t%s\n",t);
    printf(" \n\t\t\t\t\t\t\t*******************************************************************************\n\n ");
    printf("\t\t\t\t\t\t\t\t*****WELCOME TO KINDACARE DIGITAL LEARNING SYSTEM******\n\t\t\t\t\t\t\t\t\t\tPUPIL'S COMMANDLINE\n");
    printf(" \n\t\t\t\t\t\t\t*******************************************************************************\n\n ");
}
//SQL ERROR FUNCTION
void finish_with_error(MYSQL*conn){
fprintf(stderr,"%s\n",mysql_error(conn));
mysql_close(conn);
exit(1);
}

int main(){

    char array[100]={"6"};
    //other variables
    char assignment[15];
    int answer[26][7][4];
    int letters[7][4];
    char usercode[25];
    double total;
    float entry=0;
    int result;
    float average;
    double score=0;
    float sum=0;
    int Choice;
    int count=1;
    int n,i,j;
    double TOTAL_TIME;
    float total_marks;
    char trash[10];
    int nchars;
    //DECLARATION OF MYSQL VARIABLES
    MYSQL_RES *resultset;
    MYSQL_RES *res;
    MYSQL_ROW row;
    MYSQL_RES*name;
    char Fname[30], sqlquery[255];
    char pass[10];
    MYSQL * conn;
    //database connection


    LOGIN:
    header();
    printf("\n\n\n\n\t\t----PUPIL LOGIN----\n\n");
    printf("\tTo continue, Enter your user code below\n");
    printf("\tusercode: ");
    scanf("%s",usercode);
    conn = mysql_init(NULL);
    conn = mysql_real_connect(conn,"localhost","root","","kindercare",0,NULL,0);
    printf("\n\tconnecting to database.... Please wait... ");
   Sleep(1000);
   if(conn){
     printf("\tDatabase Connection successful\n\n");
   }
   else {
     printf("\tConnection to database failed\n\n");
   }

   char query[255];

    strcpy(query,"SELECT * FROM pupil WHERE userCode = \'");
    strcat(query,usercode);
    strcat(query,"\'");
     if(mysql_query(conn,query)){
      finish_with_error(conn);
    }
     res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }

    if(row=mysql_fetch_row(res))
    {
        printf("\n\tlogged in successfully as %s %s\n\n\tLoading content...",row[1],row[2]);
        Sleep(3000);
        system("cls");
    }
    else
    {
        printf("\n\tSorry usercode does not exist\n");
        Sleep(3000);
        system("cls");
        goto LOGIN;
    }

    char letter[50]="ABCDEFGHIJKLMNOPQRSTUVWXYZ";


//EXPECTED PLOTTING OUR LETTERS
   int characters[26][7][4] = {
    {0,1,1,0,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter A
    {1,1,1,0,1,0,0,1,1,0,1,0,1,1,0,0,1,0,1,0,1,0,0,1,1,1,1,0},	    //Expected plotting for letter B
    {0,0,1,1,0,1,0,0,1,0,0,0,1,0,0,0,1,0,0,0,0,1,0,0,0,0,1,1},		//Expected plotting for letter C
    {1,1,1,0,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,0},		//Expected plotting for letter D
    {1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,0,1,0,0,0,1,0,0,0,1,1,1,1},		//Expected plotting for letter E
    {1,1,1,1,1,0,0,0,1,0,0,0,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0},		//Expected plotting for letter F
    {0,1,1,0,1,0,0,1,1,0,0,0,1,0,0,0,1,0,1,1,1,0,0,1,0,1,1,0},		//Expected plotting for letter G
    {1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter H
    {1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,1,1,1,1},		//Expected plotting for letter I
    {1,1,1,1,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,1,1,1,0},		//Expected plotting for letter J
    {1,0,0,1,1,0,1,0,1,1,0,0,1,0,0,0,1,1,0,0,1,0,1,0,1,0,0,1},		//Expected plotting for letter K
    {1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,1,1,1},		//Expected plotting for letter L
    {1,0,0,1,1,1,0,1,1,0,1,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter M
    {1,0,0,1,1,1,0,1,1,0,1,1,1,0,1,1,1,0,0,1,1,0,0,1,1,0,0,1},		//Expected plotting for letter N
    {0,0,1,1,0,1,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,0},		//Expected plotting for letter O
    {0,1,1,0,0,1,0,1,0,1,0,1,0,1,1,0,0,1,0,0,0,1,0,0,0,1,0,0},		//Expected plotting for letter P
    {0,1,1,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,0,1,1,1,0,0,1,1},		//Expected plotting for letter Q
    {0,1,1,1,0,1,0,1,0,1,0,1,0,1,1,0,0,1,1,0,0,1,0,1,0,1,0,1},		//Expected plotting for letter R
    {0,0,1,1,0,1,0,0,0,1,0,0,0,0,1,0,0,0,1,0,0,0,1,0,1,1,0,0},		//Expected plotting for letter S
    {1,1,1,1,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0,0,1,0,0},		//Expected plotting for letter T
    {1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,1,1,1},		//Expected plotting for letter U
    {1,0,0,1,1,0,0,1,0,1,0,1,0,1,1,0,0,1,1,0,0,0,1,0,0,0,1,0},		//Expected plotting for letter V
    {1,0,0,1,1,0,0,1,1,0,0,1,1,0,0,1,1,0,1,1,1,0,1,1,1,0,1,1},		//Expected plotting for letter W
    {1,0,0,1,0,0,0,0,0,1,1,0,0,0,0,0,0,1,1,0,0,0,0,0,1,0,0,1},		//Expected plotting for letter X
    {1,0,0,1,1,1,0,1,0,1,1,1,0,0,1,1,0,0,0,1,0,0,0,1,0,0,0,1},		//Expected plotting for letter Y
    };


    header();
   MENU:
         printf("\n\n\n\n\t\t\t----MENU----\n\n\tEnter a command from the list below\n\n\t1.Viewall\n\t2.Checkstatus\n\t3.Viewassignment\n\t4.Checkdates\n\t5.RequestActivation\n\t6.LOGOUT");
    char choice[20];
     char a[20]="Viewall";
     char b[20]="Checkstatus";
    char c[20]="Viewassignment";
    char d[20]="Checkdates";
    char e[20]="RequestActivation";
    char f[10]="LOGOUT";
    printf("\n\n\tYOUR CHOICE: ");
    scanf("%s",choice);
    /*VIEWALL*/
    if(strcmp(a,choice)==0){
            system("cls");
            header();
                printf("\n\n\n\n\t\t\t\t----VIEWALL----\n\n");
            printf("\tBelow is the list of assignments you are supposed to attempt:\n");
            printf("\n\t............................................................................................................................................................................\n");
        printf("\n\t|  ASSIGNMENT_ID\t\t|DUE_DATE\t\t\t|START_TIME\t\t\t|END_TIME\t\t\t|DURATION\t\t|STATUS\t           |\n");
 printf("\t|..........................................................................................................................................................................|\n");

    strcpy(query,"SELECT assignmentNo,attemptDate,start_time,end_time,duration,assignment_status FROM assignment WHERE assignment_status != \'");
    strcat(query,"Expired");
    strcat(query,"\'");
     if(mysql_query(conn,query))
    {
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   int num_fields=mysql_num_fields(res);
   while((row=mysql_fetch_row(res))){
    for(int i=0;i<num_fields;i++){
    printf(" \t\t  %s\t",row[i]?row[i]:NULL);

      }

//printf("\n");
printf("\n\t|..........................................................................................................................................................................|\n");
    }
   mysql_free_result(res);
        goto MENU;
    }
    /*CHECKSTATUS*/
    else if(strcmp(b,choice)==0){
            system("cls");
            header();
            printf("\n\n\n\n\t\t\t\t----CHECKSTATUS----\n\n");
            printf("\tBelow is the list of assignments you have attempted:\n");
            printf("\n\t...................................................................................................................\n");
        printf("\n\t|  ASSIGNMENT_ID\t\t|SCORE\t\t\t|DURATION\t\t |TEACHER'S_COMMENT                |\n");
        printf("\t|..................................................................................................................|\n");


    strcpy(query,"SELECT * FROM marks WHERE pupil_userCode = \'");
    strcat(query,usercode);
    strcat(query,"\'");
     if(mysql_query(conn,query)){
      finish_with_error(conn);
    }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }
   int num_fields=mysql_num_fields(res),rows=0;
   if((row=mysql_fetch_row(res))==NULL)
   {
       printf("\n\tOops!! You have not attempted any assignment yet");
   }
   else
   do{
        rows++;
    for(int i=2;i<num_fields;i++){
    printf(" \t\t  %s\t",row[i]?row[i]:NULL);

      }

//printf("\n");
printf("\n\t|..................................................................................................................|\n");
    }while((row=mysql_fetch_row(res)));

    char query7[255]="SELECT COUNT(AssignmentNo) from assignment where assignment_status=\'Open\'";
    if(mysql_query(conn,query7)){
         fprintf(stderr, "%s\n", mysql_error(conn));
    }
    res = mysql_store_result(conn);
    row = mysql_fetch_row(res);
    char attem_tot[45];
    strcpy(attem_tot,row[0]);
    printf("\n\n\tTOTAL OPEN ASSIGNMENTS:\t%s",row[0]);

    printf("\t\t\t\t\tTotal number of assignments attempted: %d\n",rows);

    //convert to floats
     float total_assigments=atof(attem_tot);
    float attempt_assignments=rows;
    //printf("%f and %f",attempt_assignments,total_assigments);
    //check status end
    double percent_attempt=(attempt_assignments*100)/total_assigments;
    printf("\n\tPERCENTAGE ATTEMPTED:\t%.2f%%",percent_attempt);
    double percent_missed=100-percent_attempt;
    printf("\t\t\t\t\tPERCENTAGE MISSED:\t%.2f%%\n\n",percent_missed);
mysql_free_result(res);
        goto MENU;
        //END OF CHECKSTATUS
    }
    /*VIEWASSIGNMENT*/
    else if(strcmp(c,choice)==0){

          system("cls");
            header();
            char assgNo[5];
            char TeacherId[5];
                label1:
            printf("\n\n\n\n\t\t\t\t----VIEW ASSIGNMENT----\n\n");
            printf("\tENTER ASSIGNMENT_ID: ");
            scanf("%s",assgNo);
             strcpy(query,"select assignmentNo,noOfChars,Characters,attemptDate,start_time,end_time,duration,assignment_status,teacher_id FROM assignment where assignmentNo = \'");
             strcat(query,assgNo);
             strcat(query,"\'");
             strcat(query,"AND assignment_status !=\'");
             strcat(query,"Expired");
             strcat(query,"\'");
            mysql_query(conn,query);

         res = mysql_use_result(conn);
         // printf("AssignmentNo   start_time    End_time   Characters   Duration\n");

         if((row = mysql_fetch_row(res)) == NULL)
         {
             printf("\n\tOops!! Assignment %s is unavailable. Visit \"Viewall\" for available assignments",assgNo);

         }

            else
            {

            printf("\n\tBelow are the details of assignment ");
            printf("%s",row[0]);
            printf("\n\n\tNo. of chars: ");
            printf("\t%s",row[1]);
            printf("\n\tCharacters: ");
            printf("\t%s",row[2]);
            printf("\n\tDue Date: ");
            printf("\t%s",row[3]);
            printf("\n\tStart_time: ");
            printf("\t%s",row[4]);
            printf("\n\tEnd_time: ");
            printf("\t%s",row[5]);
            printf("\n\tDuration: ");
            printf("\t%smins",row[6]);
            printf("\n\tStatus: ");
            printf("\t%s",row[7]);
            strcpy(TeacherId,row[8]);
            strcpy(assignment,row[2]) ;

            printf("\n\n\tDO YOU WANT TO ATTEMPT ASSIGNMENT? (Enter y for yes or Press any key to cancel)");
            printf("\n\tChoice: ");
            char opt;
            getchar();
            scanf("%c",&opt);
            if(opt=='y')
            {
                if(strcmp(row[7],"Pending")==0)
                {
                    printf("\n\tOops!! Assignment is not yet open. Please try another assignment\n\tNOTE: Only open assignments can be attempted");
                }
                else
                {
                      mysql_free_result(res);
                    strcpy(sqlquery,"SELECT * FROM marks WHERE pupil_userCode = \'");
                    strcat(sqlquery,usercode);
                    strcat(sqlquery,"\'");
                    strcat(sqlquery,"AND assignmentNo=\'");
                    strcat(sqlquery,assgNo);
                    strcat(sqlquery,"\'");
                    strcat(sqlquery,"AND teacher_id=\'");
                    strcat(sqlquery,TeacherId);
                    strcat(sqlquery,"\'");

                     if(mysql_query(conn,sqlquery)){
                      finish_with_error(conn);
                    }
                     res=mysql_store_result(conn);
                   if(res==NULL){
                    finish_with_error(conn);
                   }

                    if(row=mysql_fetch_row(res))
                    {
                        system("cls");
                        header();
                        printf("\n\tAssignment %s already attempted. Please attempt another assignment if any",assgNo);
                        goto label1;
                    }

                    mysql_free_result(res);
                     char sq[255];
                    time_t curr;
                    curr=time(NULL);
                    struct tm tm=*localtime(&curr);
                    strcpy(sq,"select start_time from assignment where start_time  > \'%02d:%02d:%02d\' AND assignmentNo = \'%s\'");
                    sprintf(sq,sq,tm.tm_hour,tm.tm_min,tm.tm_sec,assgNo);
                    printf("query is %s",sq);

                     if(mysql_query(conn,sq)){
                      finish_with_error(conn);
                    }
                     res=mysql_store_result(conn);
                   if(res==NULL){
                    finish_with_error(conn);
                   }


                    if(row=mysql_fetch_row(res))
                    {
                        system("cls");
                        header();
                        printf("\n\tTime for attempting this assignment %s is not due. Carefully check Viewassignment for the right time",assgNo);
                        mysql_free_result(res);
                        goto label1;

                    }

                    system("cls");
                    header();

                    printf("\n\t---ATTEMPT ASSIGNMENT---");
                    printf("\n\n\tThe characters you are going to draw are: %s",assignment);
                    printf("\n\n\n\n\tPreparing your working area, please wait...");
                    fgets(trash,5,stdin);
                    Sleep(3000);


            nchars=0;
            int line;
            int box;
            for(int x=0;x<(strlen(assignment));x+=2){
                for(int y=0;y<strlen(letter);y++){
                    if(assignment[x]==letter[y]){
                    system("cls");
                    header();
                    nchars++;
                    printf("\n\n\tDRAW LETTER: %c\n",assignment[x]);



                    //int correct_stars;
                    line=1;
                    box=1;
                    clock_t t=clock();
                    for(int i=0;i<7;i++){
                        for(int j=0;j<4;j++){
                                loop:
                            printf("\n\tEnter 0 or 1 in position line[%d] box[%d]: ",line,box);
                            scanf("%d",&answer[y][i][j]);

                            if(answer[y][i][j] == 0 || answer[y][i][j]==1)
                            {
                                if(answer[y][i][j]==characters[y][i][j]){
                                    score=score+1;
                                }
                            }
                            else
                            {
                                printf("\n\n\tPlease enter only a 1 or 0\n");
                                goto loop;
                            }
                            box++;

                        }
                        printf("\n");
                        line++;
                    }

                    t=clock()-t;

                    double time_taken=((double)t)/CLOCKS_PER_SEC;
                    printf("\tTIME TAKEN :%fsecs\n",time_taken);
                    TOTAL_TIME+=time_taken;
                    total=total+score;

                     printf("\n\tLETTER DRAWN IS AS SEEN BELOW:\n");
                     for(int i=0;i<7;i++){
                        printf("\t\t");
                        for(int j=0;j<4;j++){
                            if(answer[y][i][j]==1){
                                printf("*");
                            }
                            else{
                                printf(" ");
                            }
                        }
                        printf("\n");
                     }
                     printf("\n\tCORRECT ANSWER IS AS SEEN BELOW:\n");
                    for(int i=0;i<7;i++){
                        printf("\t\t");
                        for(int j=0;j<4;j++){
                            if(characters[y][i][j]==1){
                                printf("*");
                            //++correct;

                            }
                            else{
                                printf(" ");
                            }
                        }
                        printf("\n");
                    }

                    printf("\n\tyour score is: ");
                    printf("%.0f",score);
                    score=0;
                    printf("\n\n\tLoading next letter...");
                    fgets(trash,5,stdin);
                    Sleep(3000);

                    }
                }

            }



            mysql_free_result(res);
            submit:
            system("cls");
            header();
            printf("\n\n\tAll letters attempted.\n\n\tResults");
            total_marks=(total/(28*nchars))*100;
            TOTAL_TIME=TOTAL_TIME/60;
            printf("\tFINAL MARK SCORED:\t%.0f%c\n",total_marks,37);
            printf("\tTOTAL TIME TAKEN IS:\t\t %.3f minutes",TOTAL_TIME);

            printf("\n\n\tEnter s to submit your assignment or Press any key to quit.");
            printf("\n\tNOTE: when you quit, your progress will be lost and you will need to re-attempt this assignment");
            printf("\n\n\tYour choice: ");
            scanf("%c",&opt);
            if(opt=='s')
            {

            char sql[255];
            char total[3];
            char TOTALTIME[6];
            strcpy(sql,"INSERT INTO marks(teacher_id,pupil_userCode,assignmentNo,score,duration) VALUES (\'");
            strcat(sql,TeacherId);
            strcat(sql,"\',\'");
            strcat(sql,usercode);
            strcat(sql,"\',\'");
            strcat(sql,assgNo);
            strcat(sql,"\',\'");
            sprintf(total,"%.0f",total_marks);
            strcat(sql,total);
            strcat(sql,"\',\'");
            sprintf(TOTALTIME,"%.3f",TOTAL_TIME);
            strcat(sql,TOTALTIME);
            strcat(sql,"\')");

                if(mysql_query(conn,sql))
                {
                    printf("\n\n\tAssignment submitted successfully");
                    printf("\n\t\tTHANK YOU FOR ATTEMPTING");
                }
                else
                {
                    printf("An error occured. assignment not submitted");
                    goto submit;
                }
            }
            else
            {
                printf("\n\n\tAre you sure you want to quit?");
                printf("\n\n\tEnter y to quit  or Press any key to go back: ");
                scanf("%c",&opt);
                if(opt=='y')
                {


                }
                else
                    goto submit;

            }
        }
    }
}

  mysql_free_result(res);
     goto MENU;

        //END OF VIEWASSIGNMENT
    }
    /*check date*/
    else if(strcmp(d,choice)==0){
            system("cls");
            header();

            char maxDate[10];

            char minDate[10];

            fgets(trash,10,stdin);
            printf("\n\n\n\t\t\t\t\t----CHECKDATES----");
            printf("\n\tEnter datefrom (yyyy-mm-dd): ");
            scanf("%s",minDate);
            printf("\n\tEnter dateto (yyyy-mm-dd): ");
            scanf("%s",maxDate);

    strcpy(query,"SELECT assignmentNo,attemptDate,start_time,end_time,duration,assignment_status FROM assignment WHERE assignment_status != \'");
    strcat(query,"Expired");
    strcat(query,"\'");
    strcat(query," AND attemptDate BETWEEN \'");
    strcat(query,minDate);
    strcat(query,"\'");
    strcat(query, " AND ");
    strcat(query,"\'");
    strcat(query,maxDate);
    strcat(query,"\'");

     if(mysql_query(conn,query))
    {
    finish_with_error(conn);
   }
   res=mysql_store_result(conn);
   if(res==NULL){
    finish_with_error(conn);
   }

   if((row=mysql_fetch_row(res))==NULL)
   {
       printf("\n\n\tThere are no assignments in the specified date range");
   }
   else
    {
        printf("\n\n\tBelow are the assignments within the specified date range\n");
        printf("\n\t............................................................................................................................................................................\n");
        printf("\n\t|  ASSIGNMENT_ID\t\t|DUE_DATE\t\t\t|START_TIME\t\t\t|END_TIME\t\t\t|DURATION\t\t|STATUS\t           |\n");
        printf("\t|..........................................................................................................................................................................|\n");

        do
        {
            printf(" \t\t  %s\t\t\t  %s\t\t\t  %s\t\t\t  %s\t\t\t  %s\t\t\t  %s\t",row[0],row[1],row[2],row[3],row[4],row[5]);
            printf("\n\t|..........................................................................................................................................................................|\n");
        }while((row=mysql_fetch_row(res)));
    }
mysql_free_result(res);
        goto MENU;
        //CHECKDATES
    }
    else if(strcmp(e,choice)==0){
            //ACTIVATION REQUEST SENDING

            system("cls");
            header();

        printf("\n\t ***ACTIVATION REQUEST TO TEACHER***\n");
        char opt;
        printf("\n\tEnter y to send a request or Press any key to quit: ");
        getchar();
        scanf("%c",&opt);
        if(opt=='y')
        {

            strcpy(query,"SELECT * FROM pupil WHERE userCode = \'");
            strcat(query,usercode);
            strcat(query,"\'");
             if(mysql_query(conn,query)){
              finish_with_error(conn);
            }
             res=mysql_store_result(conn);
           if(res==NULL){
            finish_with_error(conn);
           }

           row=mysql_fetch_row(res);
            if(strcmp(row[6],"Active")==0)
            {
                printf("\n\tYou are already activated by the teacher");
            }
            else
            {
                strcpy(query,"SELECT * FROM activation_request  WHERE pupil_userCode  = \'");
            strcat(query,usercode);
            strcat(query,"\'");
             if(mysql_query(conn,query)){
              finish_with_error(conn);
            }

             res=mysql_store_result(conn);
           if(res==NULL){
            finish_with_error(conn);
           }
           row=mysql_fetch_row(res);
            if(row[2])
            {
                printf("\n\tSorry!! you already sent your request\n");

            }
            else
            {
                strcpy(query,"UPDATE activation_Request SET request=\'");
                strcat(query,"Please activate me");
                strcat(query,"\'");
                strcat(query,"WHERE pupil_userCode=\'");
                strcat(query,usercode);
                strcat(query,"\'");
                if(mysql_query(conn,query))
                    {
                        finish_with_error(conn);
                    }
                    printf("\n\tNOTIFICATION: Request successfully sent to teacher");
            }

            }


        }
        printf("\n");

        goto MENU;
        //REQUEST ACTIVATION
    }

    else if(strcmp(f,choice)==0){
     system("cls");
     header();
     printf("\n\n\n\tThanks for using Kindercare Digital learning system. See you next time..");
     printf("\n\n\t\tReinitialising...");
     Sleep(3000);
     system("cls");
     main();
    }
    else{
    system("cls");
    header();
    printf("\n\n\n\n\tInvalid command! please try again\n");
        goto MENU;
    }
     mysql_close(conn);
}
