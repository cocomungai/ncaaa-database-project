# ncaa-database-project
In this project, we will focus on using a NCAA dataset for creating an application.

## Getting started
This project uses a Kaggle dataset that includes information for player statistics in individual NCAA basketball games from 2013 to 2017. The dataset can be found [here](https://www.kaggle.com/abhimalik96/ncaa-player/data).

Start by downloading the dataset zip file. After unzipping and choosing a location for the .csv, replace the filepath in Load.sql with your own absolute path to the file.

Note: a gitignore file is provided that already ignores the .csv in this repo with its default name and with the name "ncaa-bball-stats.csv".

Run the following files in this order: `NCAAMegatableLoad.sql`, `MegatableTriggers.sql`, and lastly `Load.sql`.