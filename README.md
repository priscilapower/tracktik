## PHP Developer Evaluation - Priscila Power

Using the code given, create each type of electronic as classes. Every
ElectronicItem must have a function called maxExtras that limits the number of extras an
electronic item can have. The extras are a list of electronic items that are attached to another
electronic item to complement it.

❖ The console can have a maximum of 4 extras;

❖ The television has no maximum extras;

❖ The microwave can't have any extras;

❖ The controller can't have any extras.

Create a scenario where a person would buy:
1 console, 2 televisions with different prices and 1 microwave.

The console and televisions have extras; those extras are controllers. The console has 2 remote
controllers and 2 wired controllers. The TV #1 has 2 remote controllers and the TV #2 has 1
remote controller.

Sort the items by price.

### API
This is a short API to display the responses for this test.

### Getting Started
Let's install the dependencies:

```
composer install
```

Run the API locally by running the command:

```
php -S localhost:8000
```


Now the service is ready, and the API will be available on the host:

```
http://localhost:8000
```



### Routes:

We only have two endpoints to answer the follow-up questions:



#### Question 01

Output the total pricing.

```
http://localhost:8000/question/01
```

#### Question 02
That person's friend saw her with her new purchase and asked her how much the
console and its controllers had cost her

```
http://localhost:8000/question/02
```


**- Thank you -**