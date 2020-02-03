import { Component, OnInit } from '@angular/core';
import { StudentsService } from '../students.service';
import { Router } from '@angular/router';
import { Students } from '../students';

@Component({
  selector: 'app-view',
  templateUrl: './view.component.html',
  styleUrls: ['./view.component.css']
})
export class ViewComponent implements OnInit {
   students: Students[];
   _id: any;
  constructor(private _studentsService: StudentsService,
     private router:Router
    ) { }

  

  ngOnInit() {
    
    this._studentsService.getStudents().subscribe((data :  Students[]) => {    
       this.students = data;
      

    });
  }
  
  delete(students: Students): void{
   
    this._studentsService.deleteStudent(students.sId)
    .subscribe(data => { this.students = this.students.filter( u => u !== students);
    
    });   
  }


  edit(students: Students){
          this._id = students.sId;
          this.router.navigate(['edit/' + this._id]);
  }

}