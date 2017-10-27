/*
	Name		: Gurcharn Singh Sikka
	Student no	: 2899330
*/

import java.io.*;
import java.util.*;
import java.util.function.*;
public class Assignment9_2017 {
	public static void main(String[] args) {
	 
		BinarySearchTree<Word> bst1 = new BinarySearchTree<Word>();
		
		bst1.add(new Word("public"));		bst1.add(new Word("static"));		bst1.add(new Word("void"));		bst1.add(new Word("main"));
		bst1.add(new Word("min"));		bst1.add(new Word("word"));		bst1.add(new Word("alphabet"));		bst1.add(new Word("set"));
		bst1.add(new Word("data"));		bst1.add(new Word("false"));		bst1.add(new Word("height"));		bst1.add(new Word("java"));
		bst1.add(new Word("while"));		bst1.add(new Word("for"));		bst1.add(new Word("found"));		bst1.add(new Word("else"));
		bst1.add(new Word("equals"));		bst1.add(new Word("extends"));		bst1.add(new Word("this"));		bst1.add(new Word("util"));
		
		System.out.println(bst1);
		
		bst1.remove(new Word("util"));
		
		System.out.println(bst1.preOrder());
		
		System.out.println(bst1.inOrder());
		
		System.out.println(bst1.postOrder());
		
		System.out.println(bst1.height());
		
		System.out.println(bst1.contains(new Word("false")));	

		System.out.println(bst1.maxElement());
	 
	}

}
class Word implements Comparable<Word>{
	private String word;
	Word(String s){
		assert nonBlank(s);
		word = s;
	}
	public String word(){return word;}
	public String toString(){return word;}
	public int compareTo(Word wd){
		if(wd == null) return -1;
		return word.compareTo(wd.word());
	}
	private boolean nonBlank(String s){
		for(int j = 0; j < s.length();j++) if(s.charAt(j) ==' ') return false;
		return true;
	}
	
	public boolean equals(Object ob){
		if(!(ob instanceof Word))
		return false;
		Word w = (Word)ob;
		return ( word.equals(w.word()) );
	}
}
class BinarySearchTree<E extends Comparable<E>> implements Iterable<E>{
	private BNode<E> root;
	private int count;
	public BinarySearchTree(){
		root = null; count = 0;
	}
	public BinarySearchTree(Collection <? extends E> ls){
		root = null; count = 0;
		for(E x : ls) this.add(x);
	}
	public void add(E x){
	  root = add(root,x);
	}
	private BNode<E> add(BNode<E> rt, E x){
	  if(x == null) return rt; //do not allow null values
		if(rt == null){
			count++;
			return new BNode<E>(x);
		}
		else if(x.compareTo(rt.data()) < 0){
			BNode<E> p = add(rt.left(), x);
			rt.setLeft(p);
			return rt;
		}
		else if(x.compareTo(rt.data()) > 0){
			BNode<E> p = add(rt.right(), x);
			rt.setRight(p);
			return rt;
		}
		else // x present, so no change
			return rt;
	}
	public boolean contains(E x){
		return contains(root, x);
	}
	private boolean contains(BNode<E> rt, E x){
		if(rt == null) return false;
		else{
			if(rt.data().equals(x)) return true;
			else if(x.compareTo(rt.data()) < 0)
				return contains(rt.left(),x);
			else
				return contains(rt.right(), x);
		}
	}
	public int size(){
		return count;
	}

	public void remove(E x){
		BNode<E> ptr = null; BNode<E> parentPtr = null;
		if(root != null){
			ptr = root; parentPtr = root;
			boolean found = false;
			while(ptr != null && !found){
				if(ptr.data().equals(x)) found = true;
				else{
					parentPtr = ptr;
					if(x.compareTo(ptr.data()) < 0)
						ptr = ptr.left();
					else
						ptr = ptr.right();
				}
			}
			if(found){
				count--;
				if(ptr == root){
					root = removeNode(root);
				}
				else{
					if(x.compareTo(parentPtr.data()) < 0){
						BNode<E> n = removeNode(parentPtr.left());
						parentPtr.setLeft(n);
					}
					else{
						BNode<E> n = removeNode(parentPtr.right());
						parentPtr.setRight(n);
					}
				}
			}
		}
	}
	private BNode<E> removeNode(BNode<E> rt){
		if(rt == null) return null;
		else if (rt.left() == null && rt.right() == null)
			return null;
		else if(rt.left() == null)
			return rt.right();
		else if(rt.right() == null){
			return rt.left();
		}
		else{
			BNode<E> ptr = rt.left();
			BNode<E> parentPtr = null;
			while(ptr.right() != null){
				parentPtr = ptr; ptr = ptr.right();
			}
			rt.set(ptr.data());
			if(parentPtr == null)
				rt.setLeft(ptr.left());
			else
				parentPtr.setRight(ptr.left());
			return rt;
		}
	}
	public int height(){
		return height(root);
	}
	private int height(BNode<E> rt){
		if(rt == null) return -1;
		else{
			return 1 + max(height(rt.left()),height(rt.right()));
		}
	}
	private int max(int a,int b){ return a >= b? a:b;}

	public ArrayList<E> inOrder(){
		ArrayList<E> lst = new ArrayList<E>();
		inOrder(root,lst);
		return lst;
	}
	private void inOrder(BNode<E> rt, ArrayList<E> lst){
	 if(rt != null){
		 inOrder(rt.left(), lst);
		 lst.add(rt.data());
		 inOrder(rt.right(),lst);
	 }
	}
	public ArrayList<E> preOrder(){
		ArrayList<E> lst = new ArrayList<E>();
		preOrder(root,lst);
		return lst;
	}
	private void preOrder(BNode<E> rt, ArrayList<E> lst){
		if(rt != null){
			lst.add(rt.data());
			preOrder(rt.left(), lst);
			preOrder(rt.right(),lst);
		 }
	}
	public ArrayList<E> postOrder(){
		ArrayList<E> lst = new ArrayList<E>();
		postOrder(root,lst);
		return lst;
	}
	private void postOrder(BNode<E> rt, ArrayList<E> lst){
		if(rt != null){
			postOrder(rt.left(), lst);
			postOrder(rt.right(),lst);
			lst.add(rt.data());
		 }
	}
	public Iterator<E> iterator(){
		ArrayList<E> ls = this.inOrder();
		return ls.iterator();
	}
	public String toString(){
		return this.inOrder().toString();
	}
	
	private class BNode<E extends Comparable<E>>{
	 	private E data;
	 	private BNode<E> left;
		private BNode<E> right;
		public BNode(E d){
			data = d; left = null; right = null;
		}
		public E data(){return data;}
		public void set(E x){data = x;}
		public BNode<E> left(){ return left;}
		public BNode<E> right(){return right;}
		public void setLeft(BNode<E> k){left = k;}
		public void setRight(BNode<E> k){right =k;}
		}
		

		public E maxElement(){
			ArrayList<E> al = this.inOrder();
			int index = 0;
			
			for(int i=0 ; i<al.size() ; i++)
			{
				if((al.get(index)).compareTo(al.get(i)) <= 0)
				{
					index = i;
				}
			}
			
			return al.get(index);
		}
		
		public ArrayList<E> leafNodes(){
			ArrayList<E> al = new ArrayList<E>();
			
				if(root == null) return null;
				
				else if(root.left()==null && root.right()==null){al.add(root.data());}
				
				else{	
					BNode<E> x = root;
					x = getleaf(x);
					al.add(x.data());
				}
				
				return al;
					
		}
		
		public BNode<E> getleaf(BNode<E> leaf){
			
			
			if(leaf == null) return null;
			
			if(leaf.left() == null && leaf.right() == null) return leaf;
			
			if(leaf.left() != null) return getleaf(leaf.left());
			
			else
				return getleaf(leaf.right());		
			
		}
		
		public List<E> get(Predicate<E> pr){
			LinkedList<E> pre = new LinkedList<>();
			LinkedList<E> list = new LinkedList<>();
			
			pre.addAll(this.inOrder());
			
			for(E x : this.inOrder())
			{
				if(pr.test(x)) list.add(x);
			}
			
			return list;
		}
		
}


