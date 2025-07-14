<div class="mb-3">
                                <label for="title">Title</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $course->title ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="category_id">Category</label>
                                <select name="category_id" class="form-control" required>
                                    <option value="">-- Choose Category --</option>
                                         @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category_id', $course->category_id ?? '') == $category->id) ? 'selected' : '' }}>
                                             {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="teacher_id">Teacher</label>
                                <select name="teacher_id" class="form-control" required>
                                    <option value="">-- Choose Teacher --</option>
                                    @foreach($teachers as $teacher)
                                        <option value="{{ $teacher->id }}" {{ (old('teacher_id', $course->teacher_id ?? '') == $teacher->id) ? 'selected' : '' }}>
                                            {{ $teacher->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="duration">Duration</label>
                                <input type="text" name="duration" class="form-control" value="{{ old('duration', $course->duration ?? '') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="price">Price ($)</label>
                                <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $course->price ?? 0) }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="is_paid">Is Paid?</label>
                                <select name="is_paid" class="form-control" required>
                                    <option value="1" {{ old('is_paid', $course->is_paid ?? 1) ? 'selected' : '' }}>Yes</option>
                                    <option value="0" {{ !old('is_paid', $course->is_paid ?? 1) ? 'selected' : '' }}>No</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $course->description ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="requirements">requirements</label>
                                <textarea name="requirements" class="form-control" rows="4">{{ old('requirements', $course->requirements ?? '') }}</textarea>
                            </div>

                            <div class="mb-3">
                                <label for="image">Image</label>
                                <input type="file" name="image" class="form-control">
                                @if (!empty($course->image))
                                    <img src="{{ asset('uploads/' . $course->image) }}" width="100" class="mt-2">
                                @endif
                            </div>


