#include<stdio.h>
#include<conio.h>
#include<stdlib.h>
typedef struct
{
	int front;
	int rear;
	int q[20];
	int size;
}squeue;

int isempty(squeue sq)
  {
     if(sq.front==sq.rear)
	 return 1;
     else
	 return -1;
  }
int isfull(squeue sq)
  {
     if( sq.rear==(sq.front-1+(sq.size))%sq.size)

	 return -1;
     else

	 return 1;
  }
void insert(squeue *sq)
  {
     int ele;
     if(isfull(*sq)==-1)
	 printf("\nQueue is full\n");
     else
	 {
	     printf("\nEnter element to be inserted:");
	     scanf("%d",&ele);
	     sq->q[sq->rear]=ele;
	     sq->rear=(sq->rear+1)%sq->size;
	 }

}

void delet(squeue *sq)
  {
     if(isempty(*sq)==1)

	 printf("\nQueue is empty\n");

     else
	{
	   printf("\nThe element deleted is %d",sq->q[sq->front]);
	   sq->front=(sq->front+1)%sq->size;
	}

  }

void display(squeue sq)
  {
      int i;
      if(isempty(sq)==1)
	  printf("Queue is empty\n");

	  if(sq.front<sq.rear)
  {
	 for(i=sq.front;i<sq.rear;i++)
	 {
	    printf("%d",sq.q[i]);
	 }
  }

	 else
      {
	  for(i=sq.front;i<sq.size;i++)
	  {
	   printf("%d",sq.q[i]);
	       }
	       for(i=0;i<sq.rear;i++)
	       {
	       printf("%d",sq.q[i]);
	       }
	 }



    }


void main()
 {
    int c;
    squeue sq;
    clrscr();
    sq.rear=0;
    sq.front=0;
    printf("\nEnter the size of queue:");
    scanf("%d",&sq.size);
    while(1)
    {
    printf("\n 1. Insert\n 2. Delete\n 3. Display\n 4. Exit");
    printf("\n Enter your choice:");
    scanf("%d",&c);
    switch(c)
    {
      case 1: insert(&sq);
	      break;
      case 2: delet(&sq);
	      break;
      case 3: display(sq);
	      break;
      case 4: exit(0);
    }
    }
    getch();
 }