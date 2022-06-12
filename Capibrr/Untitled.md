# Capibrr Laravel Dating App Example Crud Usage Manual


<div style="text-align: justify">

<span class="justify">Dating App specialy desinged for fluffy capybaras the biggest rodents on earth. </span>

 #### Contents

		
<ol>
	<li> Guest Actions
		<ul>
				<li>Login</li> 
				<li>Default credentials</li> 
				<li>Register</li>  
		</ul>	
	</li>  
	<li> User Actions
		<ul>
				<li>Discover users</li> 
				<li>Matches</li> 
				<li>Settings</li>  
		</ul>	
	</li>  
	<li> Admin Actions
		<ul>
				<li>Dashboard </li> 
				<li>Users</li> 
				<li>Matches</li> 
				<li>Interests</li> 
		</ul>	
	</li>  
	<li> App Validation Examples </li>
</ol>


<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>


## Guest Actions

### Login

<span class='centerImg'> ![[Pasted image 20220612115915.png]]</span>

<span class="justify">
Go to your site main page and insert your credentials. Default administrator and users credentials are included in .env file in app capibrr directory. 
</span>
<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

### Default credentials:
Admininstrator Account:  


Email | Password
------------ | ------------
karol.saj0@gmail.com | GigaAdmin1

User Accounts:

Email | Password
------------ | ------------
(from every user email) | Qwerty1




<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>



### Register
	
<span class="justify">
If you want to register new user, click on register then fill the form according to informations 
on page, then click "Register". Then you will be logged in automaticaly.
</span>

<span class='centerImg'>![[Pasted image 20220612113930.png]]</span>
	
<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## User Actions
	
<span class="justify">
When you log in as user you will be redirected to "dashboard" page where you can select one of three sections:
</span>

<ul>
	<li>Discover users with "Jump in" button</li>
	<li>Matches</li>
	<li>Settings</li>
</ul>

	
<span class='centerImg'>![[Pasted image 20220612115805.png]]</span>
	<span class='centerImg'>![[Pasted image 20220612115810.png]]</span>
<span class='centerImg'>![[Pasted image 20220612115815.png]]</span>


In navbar you can navigate to dashboard by clicking app icon or your profile name

<span class='centerImg'>![[Pasted image 20220612112146.png]]</span>

To logout , click "Exit icon":

<span class='centerImg'>![[Pasted image 20220612112111.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Discover users
	
<span class="justify">
	Here you can discover new capybaras. In this page you can draw random capybara according to your gender.Card contains information about your potential friend like interests, age, name, description  and profile image</span>

<span class='centerImg'>![[Pasted image 20220612112337.png]]</span>


<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

#### Actions

If you want to "Like" that capybara and you are looking for contact from him/her select action "WOW". Then that user will be added to your <b>Matches</b> (when potential partner also liked you) or <b>Likes</b> when this capybara had not react to you yet. 

<span class='centerImg'>![[Pasted image 20220612113145.png]]</span>

if you want to search futher, press "MEH", then page reloads with other capybara.

<span class='centerImg'>![[Pasted image 20220612113138.png]]</span>
	
If you liked all capybaras in app database, proper information card will be showed.


<span class='centerImg'>![[Pasted image 20220612142645.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Matches 
Here you can explor your "Likes" and "Matches". When you "Match" user, you will be given contact info to your partner

<span class='centerImg'>![[Pasted image 20220612113658.png]]</span>
	
#### Actions

You can unlike every user by performing action "UNLIKE" :

<span class='centerImg'>![[Pasted image 20220612113751.png]]</span>
	

## Settings

Here you can upload your personal informations like interests, age, name, description, status and profile image. 

<span class='centerImg'>![[Pasted image 20220612115652.png]]![[Pasted image 20220612115722.png]]</span>
	
	
<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

#### Actions

When you ready to submit form, click: 


<span class='centerImg'>![[Pasted image 20220612113511.png]]</span>
		

You can also change your password. Just fill form 


<span class='centerImg'>![[Pasted image 20220612113434.png]]</span>
	
And press:

<span class='centerImg'>![[Pasted image 20220612113443.png]]</span>
				

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Admin Actions

To access admin panel, fill your admin credentials:
</br>

<span class='centerImg'>![[Pasted image 20220612113858.png]]</span>
					
<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

After succesfull action you will be redirected to main dashboard.
You can switch between dashboard pages using side menu
<br>
<span class='centerImg'>![[Pasted image 20220612114338.png]]</span>
						
In navbar you can navigate to dashboard by clicking app icon or your profile name
							
<span class='centerImg'>![[Pasted image 20220612112146.png]]</span>
							
To logout , click "Exit icon":
								
<span class='centerImg'>![[Pasted image 20220612112111.png]]</span>
							

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Dashboard 

Here you can view simple statistics in your app like :

<ul>
	<li>Number of registered users</li>
	<li>Number of Matches</li>
	<li>Most popular capybara based on number of likes</li>
	<li>Number of Matches every day from last 30 days</li>
</ul>
									
									

<span class='centerImg'> ![[Pasted image 20220612114441.png]] </span>
									
## Users

Here you can explore all users in your app.  

<span class='centerImg'>![[Pasted image 20220612114538.png]]</span>
									
You can delete selected user by clicking trash bin icon.

<span class='centerImg'>![[Pasted image 20220612114543.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Matches

Here you can explore all matches in your app.  

 <span class='centerImg'>![[Pasted image 20220612114554.png]]</span>
											
You can delete selected match by clicking trash bin icon.

											
<span class='centerImg'>![[Pasted image 20220612114543.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## Interests

Here you can explore, delete, edit and add new interests avaible for app users

												
<span class='centerImg'>![[Pasted image 20220612114621.png]]</span>


You can delete selected user by clicking trash bin icon.


<span class='centerImg'>![[Pasted image 20220612114653.png]]</span>


To edit interest, fill row of your choice with new icon name and icon class


<span class='centerImg'>![[Pasted image 20220612114807.png]]</span>


And press "Edit" button:


<span class='centerImg'>![[Pasted image 20220612114822.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>


To add new Interest, fill form inserting Interest Name and Icon Class.Icon class should be proper class of Material Design Icons icon

https://materialdesignicons.com/

<span class='centerImg'>![[Pasted image 20220612114835.png]]</span>
							
							
For example: 
							
							
<span class='centerImg'>![[Pasted image 20220612115018.png]]</span>
							
							
To perform action, Click "Plus" icon:
							
							
<span class='centerImg'>![[Pasted image 20220612115031.png]]</span>

<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

## App validation messages examples:

##### Register:

<span class='centerImg'>![[Pasted image 20220612140107.png]]</span>
											
																				  
 <span class='centerImg'>![[Pasted image 20220612140348.png]]</span>
											
<div style="page-break-after: always; visibility: hidden">
\pagebreak
</div>

#### Uploading wrong file format:
																					  
<span class='centerImg'>![[Pasted image 20220612140657.png]]</span>
											
##### Wrong user id on request:

																						  
<span class='centerImg'>![[Pasted image 20220612140852.png]]</span>										  
<span class='centerImg'>![[Pasted image 20220612140842.png]]</span>
</div>