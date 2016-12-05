select *, SUM(((is_positive * 2) - 1)) as 'score'
          from (Restaurant)
          join Vote on Restaurant.id = Vote.restaurant_id
          group by Restaurant.id, name, url, Restaurant.submitter_id, submit_date
          order by score desc

          select Restaurant.id, Restaurant.Name, Restaurant.submit_date, Restaurant.URL, SUM(((is_positive * 2) - 1)) as 'score' from Tag join Tag_Restaurant_Mapping on Tag.id = Tag_Restaurant_Mapping.tag_id join Restaurant on Restaurant.id = Tag_Restaurant_Mapping.restaurant_id join Vote on Restaurant.id = Vote.restaurant_id where tag_value like '%date%' or tag_value like '%shitty%';


select * from (select Restaurant.id, Restaurant.Name, Restaurant.submit_date, Restaurant.URL, SUM(((is_positive * 2) - 1)) as 'score' from Tag join Tag_Restaurant_Mapping on Tag.id = Tag_Restaurant_Mapping.tag_id join Restaurant on Restaurant.id = Tag_Restaurant_Mapping.restaurant_id join Vote on Restaurant.id = Vote.restaurant_id where tag_value like '%crap%' ) t where score is not null;
