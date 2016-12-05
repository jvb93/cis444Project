select *, SUM(((is_positive * 2) - 1)) as 'score'
          from (Restaurant)
          join Vote on Restaurant.id = Vote.restaurant_id
          group by Restaurant.id, name, url, Restaurant.submitter_id, submit_date
          order by score desc

          select restaurant_id  from Tag join Tag_Restaurant_Mapping on Tag.id = Tag_Restaurant_Mapping.tag_id; where tag_value like '%date%'
