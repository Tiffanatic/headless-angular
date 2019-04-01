import { Component, OnInit, Output, EventEmitter } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent implements OnInit {
 posts = [];
 @Output() postid = new EventEmitter<void>();
 constructor(private Http: HttpClient) {

 }

 onSelected(id) {
  this.postid.emit();
  console.log(this.postid);
 }

 ngOnInit(): void {
   this.Http.get('http://localhost:88/wordpress/wp-json/wp/v2/posts').subscribe(data => {
     for (let key in data) {
      if (data.hasOwnProperty(key)) {
        this.posts.push(data[key]);
      }
     }
     console.log(this.posts);
   });
 }
}
