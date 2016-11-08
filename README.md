![Example](https://github.com/stracker-phil/divi3-vb-custom-modules/raw/master/custom-module-in-frontend-editor.png)

# Info

This info shows you, how to modify your Divi3 theme to enable custom built modules in the visual builder (= in front-end editing)

Note that after this change your custom modules will show in the visual builder, but need to be modified in order to display the actual preview!
Out of the box, this modification will display a block with the text "No Preview Available" for every custom module you insert. However, you can still change the settings of the module and save the page to see the results on the saved page.

# Video Guide
Watch how I modify Divi 3.0.18 in less then 2 minutes!

https://youtu.be/rvhHuqKMCHQ

# Step 1
You need to open the file **Divi/includes/builder/frontend-builder/bundle.js** in a text editor. You will change this file.

# Step 2
Before you can edit that file you need to prettify it (i.e. make it a bit more readable). For this I use the Google Chrome browser: Simply drag the file into the browser and use the built in dev-tools to create the prettified code.

Paste the prettified code back to **bundle.js** and save. Quickly test your website to ensure Divi is still working.

# Step 3
Find the highest module ID (you don't need to know what I mean, just do it)

Past this code right BEFORE the `return` near line 16

    alert('Next ID:' + arguments[0].length)

And refresh your website once again to see the javascript alert result.
In Divi 3.0.18 the result is '739'

# Step 4
Modify the code in **snippet1.js** (you need to insert the module ID you found in one place)

Then find the correct spot in the **bundle.js** file. Very easy: Search for the term `"video-slider-item":` - it only appears once in the whole file. Scroll down to the end of the function and paste the **snippet.js** code there.

# Step 5
The last bit was difficult for me to create - but it is very simple for you :)

Paste the contents of **snippet2.js** at the end of the file, right before the final `]));` line.

# Step 6
Save and you're done! :)

Reload your website and test Divi. It will show your custom modules.

# Demo module
The file **demo-module.php** is a simple WordPress plugin that adds 2 Divi modules (both with title "Testimonial") that illustrate the change for you.

- The first module has the modification that I mentioned in the Introduction to make the preview work in visual builder.
- The second module does not have this modification and you will see how a normal module will look like. Note that it still works, but only the preview in visual builder is missing. This is how all the custom modules from Divi 2.x will look like, until the author updates them.
