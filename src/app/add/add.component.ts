import { Component, OnInit } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { StudentsService } from '../students.service';
import { Router } from '@angular/router';
import { Students } from '../students';
@Component({
  selector: 'app-add',
  templateUrl: './add.component.html',
  styleUrls: ['./add.component.css']
})
export class AddComponent implements OnInit {

  constructor(private formBuilder: FormBuilder, 
    private _studentsService:StudentsService,
    private router:Router) { 

  }
  addForm: FormGroup;

  ngOnInit() {
    this.addForm = this.formBuilder.group({
        
          fName: ['', Validators.required],
          lName: ['', [Validators.required, Validators.maxLength(9)]],
          email: ['', [Validators.required, Validators.maxLength(30)]],
    });
  }
  onSubmit(){
   
     this._studentsService.createStudents(this.addForm.value)
     .subscribe(data =>{
       this.router.navigate(['view']);
     })

  }

}
