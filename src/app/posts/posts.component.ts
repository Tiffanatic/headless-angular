import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Subject, Observable } from 'rxjs';

@Component({
  selector: 'app-posts',
  templateUrl: './posts.component.html',
  styleUrls: ['./posts.component.css']
})
export class PostsComponent implements OnInit {
  posts = [];
  private searchTerms = new Subject<string>();
  constructor(private Http: HttpClient) {

  }
  selectedpost;
onSelected(post) {
  this.selectedpost = post;
 }
onClickEvent() {
   console.log(1);
 }
search(term: string) {
  this.searchTerms.next(term);
}

  ngOnInit(): void {
    this.getheroes();
  }
  getheroes() {
    this.Http.get('http://localhost:88/wordpress/wp-json/wp/v2/posts').subscribe(data => {
      for (let key in data) {
       if (data.hasOwnProperty(key)) {
         this.posts.push(data[key]);
       }
      }
      console.log(this.posts);
    });
  }
  searchInit() {

  }

}
