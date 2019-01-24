# -*- coding: utf-8 -*-
"""
Created on Tue Jan 15 13:02:56 2019

@author: SOUROV
"""

#from mosestokenizer import MosesDetokenizer
from nltk.corpus import stopwords
from gensim.models import Word2Vec
import numpy as np
from math import sqrt
from decimal import Decimal
import sys

def call(value):
    # The value is in value

    # Your code here
    result=[]
    # Print the final output 
    #open to file in this directory
    f1= open('/Users/SOUROV/Desktop/thesis/1.f1', 'r')
    f2= open('/Users/SOUROV/Desktop/thesis/5.f2', 'r')
    
    
    #put file data in data variable
    mainData = f1.read()
    checkSimilarityData = f2.read()
    
    
    #remove stop word from this data(am, an etc.)
    stop = set(stopwords.words('english'))
    mainData = [word for word in mainData.split() if word not in stop]
    checkSimilarityData= [word for word in checkSimilarityData.split() if word not in stop]
    print(mainData)
    print(checkSimilarityData)
    #data are tokenized to convert it to vector we must detokenize data or make it a string
    
    #detokenize = MosesDetokenizer('en')
    #mainData = detokenize(mainData)
    #checkSimilarityData = detokenize(checkSimilarityData)
    #printing data whinch are now string
    #print(mainData)
    #print(checkSimilarityData)
    model=Word2Vec(mainData,min_count=1);
    model2=Word2Vec(checkSimilarityData,min_count=1);
    
    #vocab=model.vocab.keys()
    #wordInVocab=len(vocab)
    def sent_vector (sentence,model):
        sent_vec=np.zeros(100)
        num_of_word=0
        for w in sentence: 
            try:
                sent_vec=np.add(sent_vec,model[w])
               
                num_of_word+=1
            except:
                pass
        return abs(sent_vec/np.sqrt(sent_vec.dot(sent_vec)))  #normalize sent_vec
       
    sample=sent_vector(mainData,model)
    standard=sent_vector(checkSimilarityData,model2)
    for i in range(len(mainData)):
        print(mainData[i],'-',sample[i])
    print('----------------------------')     
    for i in range(len(checkSimilarityData)):
        print(checkSimilarityData[i],'-',standard[i])
        
        
        
    def euclidean_distance(standard,sample):
      return sqrt (sum(pow(a-b,2) for a,b in zip(standard,sample)))      
        
    a=euclidean_distance(standard,sample) 
    print('euclidean')   
    print(a)
    result.append(euclidean_distance(standard,sample)+" euclidean")
    #mahanttan distance
    def manhattan_distance(standard,sample):
        return sum(abs(a-b) for a,b in zip(standard,sample))
    b=manhattan_distance(standard,sample) 
    print('manhattan')   
    print(b)
    result.append(manhattan_distance(standard,sample)+" manhattan")
    #minkowski distance
    def nth_root(value,n_root):
        root_value=1/float(n_root)
        return round(Decimal(value)** Decimal(root_value),3)
    def minkowski_distance(standard,sample):
        return nth_root(sum(pow(abs(a-b),3) for a,b in zip(standard,sample)),3)
    b=minkowski_distance(standard,sample) 
    print('minkowski')   
    print(b)
    result.append(minkowski_distance(standard,sample)+" minkowski")
    #cosine distance
    def square_rooted(x):
        return round(sqrt(sum(a*a for a in x)),3)
    def cosine_distance(standard,sample):
        numerator=sum(a*b for a,b in zip(standard,sample))
        denumerator=square_rooted(standard)*square_rooted(sample)
        return round(numerator/float(denumerator),3)
    b=cosine_distance(standard,sample) 
    print('cosine')   
    print(b)
    result.append(cosine_distance(standard,sample)+" cosine")
    #jaccard distance
    def jaccard_distance(stndard,sample):
        intersection=len(set.intersection(*[set(standard),set(sample)]))
        union=len(set.union(*[set(standard),set(sample)]))
        return intersection/float(union)
    b=jaccard_distance(standard,sample) 
    result.append(jaccard_distance(standard,sample)+" jaccard")  
    print(result)
    

if __name__ == '__main__':
    call(sys.argv[1])  
        


