/*Collection in java...

List Interface:
->List is an ordered and may allow th insert the duplicate values
->the data are srored with an index
->The values are stored in order which they are inserted.
->there are 3 main classes which implements list interface:-ArrayList,LinkedList,Vector

ArrayList:
->Ordered but not sorted
->powerful insertion and search mechaisms than array
->Vectors are same as Arraylist except they use synchronized methods.
*/
import java.util.*;
import java.io.*;

class Array_list
{
	public static void main(String args[]) throws IOException
	{
		ArrayList<String> al=new ArrayList<String>();
		BufferedReader br=new BufferedReader(new InputStreamReader(System.in));
		System.out.println("enter courses of SICSR");
		for(int i=0;i<4;i++) 
		{
			al.add(br.readLine());
		}
		al.add(4,"J2ME");
		//Collections.shuffle(al);	
		//Collections.sort(al);
		//Collections.reverse(al);
		for(String str:al)
		{
			System.out.println("value:"+str);
		}
		System.out.println("4th member->"+al.get(4));
		System.out.println("size is->"+al.size());	
		
	}
}
	