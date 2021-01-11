# Boarding Pass Sort API

I have added docker file to make it simple to run

- `docker-compose up` to run container in docker env other wise configure php in local machine
- root index.php have working example. Its making `PUT` request to `api/sorter` with sample data in response api will 
return sorted list of boarding passes in `JSON` format
- Only assumption is that trip is continues and there is no circular trip.

### Technical aspect
  
- Used factory pattern to auto generate classes for relivent boarding pass
- to add new kind of transportation just need to add new class which will implement [`BoardingPass`](https://github.com/zoomi-raja/pass-sorter/blob/master/sorter/vendor/boardingpass/BoardingPass.php) class.
- Regarding time complexity of [`sorting logic`](https://github.com/zoomi-raja/pass-sorter/blob/master/sorter/vendor/sort/Sorter.php) its only looping through array for input two time and there is no nested loop so its 2n which is O(n);

